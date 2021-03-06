<?php

require_once('autoloader.php');
try {
    // Create product
    $pizza = new \App\Product\pizza\Pizza(new \App\Product\Pizza\StrategyFactory(), 'standard', 26);
    $pizza->addIngredient(new \App\Product\pizza\Ingredient('onions'));
    $pizza->addIngredient(new \App\Product\pizza\Ingredient('olives'));

    $burger = new \App\Product\burger\Burger(new \App\Product\Burger\StrategyFactory(),'white', 'well done');
    $burger->addCheese()->addDoubleCutlet();

    $drink = new \App\Product\Drink\Drink(new \App\Product\Drink\StrategyFactory(),'coca-cola', 1);

// Create cart
    $cart = new \App\Order\Cart();

// Add product
    $cart->addItem($pizza, 4);
    $cart->addItem($burger,5);
    $cart->addItem($drink);

// Add service
    $holidayParty = new \App\Service\HolidayParty('2019-03-24', 3, 'street', '0984777332');
    $cart->addItem($holidayParty);

    (new \App\Order\PrintCart($cart))->printCart();

// Get address pizzeria
    echo 'Select Pizzeria: ' . "\n";
    print_r(\App\pizzeria\Pizzeria::getPizzeriaList());

    $customer = new \App\User\Customer\Vip('Julia', '09872227733');
// Create Order
    $order = new \App\Order\Order($cart, new \App\Order\Discount\DefaultStrategy());
    $order->setPizzeria(new \App\Pizzeria\Pizzeria('City', true));
    $payment = new \App\Order\Payment\Cash($order);
    $order->setPayment($payment, $customer);

    $cook = new \App\User\Employee\Cook('Piter');
    $order->setCook($cook);
    $manager = new \App\User\Employee\Manager('Michel');
    $order->setManager($manager);

    $surprise = new \App\Order\SurpriseStrategy($order);
    if ($surprise) {
        $drink = new \App\Product\Drink\Drink(new \App\Product\Drink\FreeStrategyFactory(), 'coca-cola', 0.5);
        $order->getCart()->addItem($drink);
    }

    echo 'Sub Total amount: ' . $order->getSubTotalAmount() . "\n";
    echo 'Discount: -' . ($order->getDiscount()/100) * $order->getSubTotalAmount() . "\n";
    echo 'Total amount: ' . $order->getTotalAmount() . "\n";

// Save order
    (new \App\Order\SaveOrder($order, new \App\Order\ValidationMinTotal($order, $customer)))->save();
    new \App\Order\SendEmail($order);


    echo 'Статус ордера: ' . $order->getStatus() . "\n";
    $order->changeStatus(\App\Order\Order::READY_STATUS, $cook);
    echo 'Статус ордера: ' . $order->getStatus() . "\n";
    $order->changeStatus(\App\Order\Order::PAID_STATUS, $manager);
    echo 'Статус ордера: ' . $order->getStatus() . "\n";
    $order->changeStatus(\App\Order\Order::DELIVERED_STATUS, $manager);
    echo 'Статус ордера: ' . $order->getStatus() . "\n";

    $res = \App\User\ACL::checkPermission(new \App\User\Customer\Permission\ViewHistoryOrder(), $customer);
    echo 'ViewHistoryOrder - '; var_dump($res);
    $res = \App\User\ACL::checkPermission(new \App\User\Customer\Permission\ViewStatusCurrentOrder(), $customer);
    echo 'ViewStatusCurrentOrder - '; var_dump($res);

// Service
    $service = new \App\service\HolidayParty('2019-03-24', 3, 'street', '0984777332');
    print_r($service->getPrice());
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}

