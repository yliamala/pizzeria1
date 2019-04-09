<?php

namespace App\Order;


interface CartInterface extends \Iterator
{

    public function addItem(CartProductInterface $cartProduct, float $qty);

    public function removeItem(CartProductInterface $cartItem);

    public function getTotalSum(): float;
}