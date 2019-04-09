<?php

namespace App\Order;

interface CartItemInterface
{
    public function getSum(): float;

    public function getItem(): CartProductInterface;

    public function getQuantity(): int;
}