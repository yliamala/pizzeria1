<?php

namespace App\Order\Cart;


interface CartInterface extends \Iterator
{

    public function addItem(ProductInterface $cartProduct, float $qty);

    public function removeItem(ProductInterface $cartItem);

    public function getTotalSum(): float;
}