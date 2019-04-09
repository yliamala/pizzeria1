<?php

require_once('autoloader.php');
try {
    // Create product
    $pizza = new \App\Product\pizza\Pizza('standard', 26);
    $pizza->addIngredient(new \App\Product\pizza\Ingredient('onions'));
    $pizza->addIngredient(new \App\Product\pizza\Ingredient('olives'));

    $burger = new \App\Product\burger\Burger('white', 'well done');
    $burger->addCheese()->addDoubleCutlet();

    $drink = new \App\Product\Drink\Drink(new \App\Product\Drink\StrategyFactory(),'coca-cola', 1);

// Create cart
    $cart = new \App\Order\Cart();

// Add product
    $cart->addItem($pizza, 4);
    $cart->addItem($burger);
    $cart->addItem($drink);

//print_r($order);
// Delete product example
//$items = $cart->getItems();
//$keys = array_keys($items);
//$firstKey = $keys[0];
//$cart->deleteProduct($cart->key());
//print_r($order);
    (new \App\Order\PrintCart($cart))->printCart();

// Get address pizzeria
    echo 'Select Pizzeria: ' . "\n";
    print_r(\App\pizzeria\Pizzeria::getPizzeriaList());

// Create Order
    $order = new \App\Order\Order($cart, new \App\Order\Discount\DefaultStrategy());
    $order->setPizzeria(new \App\pizzeria\Pizzeria('City', true));
    $payment = new \App\Order\Payment\Cash($order);
    $order->setPayment($payment);

    $cook = new \App\user\Cook('Piter');
    $order->setCook($cook);
    $manager = new \App\user\Manager('Michel');
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
    $vip = new \App\user\Vip('Julia', '09872227733');
    (new \App\Order\SaveOrder($order, new \App\Order\ValidationMinTotal($order, $vip)))->save();
    new \App\Order\SendEmail($order);


    $order->changeStatus($cook, \App\Order\Order::CONFIRMED_STATUS);
    $order->changeStatus($manager, \App\Order\Order::DELIVERED_STATUS);
    $vip->viewCurrentStatusOrder();
    $vip->viewHistoryOrder();

// Paid order
    $order->setPaid($manager);
//print_r($order);exit;

// Service
    $service = new \App\service\HolidayParty('2019-03-24', 3, 'street', '0984777332');
    print_r($service->getPrice());
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}

