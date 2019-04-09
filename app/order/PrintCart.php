<?php

namespace App\Order;

class PrintCart
{
    /**
     * @var Cart
     */
    private $cart;

    public function __construct(Cart $cart)
    {
        $this->cart = $cart;
    }

    public function printCart()
    {
        $i = 1;
        $template = "%d . %s; Qty: %d; Unit Price: %g; Price: %g;\n";
        /** @var Item $item */
        foreach ($this->cart->getItems() as $item) {
            echo sprintf($template, $i, $item->getItem()->getName(), $item->getQuantity(),
                $item->getItem()->getPrice(), $item->getItem()->getPrice() * $item->getQuantity());
            $i++;
        }
        echo "Total sum: " . $this->cart->getTotalSum() . "\n";
    }
}