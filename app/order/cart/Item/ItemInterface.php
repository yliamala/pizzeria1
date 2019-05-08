<?php

namespace App\Order\Cart\Item;

use App\Order\Cart\ProductInterface;

interface ItemInterface
{
    public function getSum(): float;

    public function getItem(): ProductInterface;

    public function getQuantity(): int;
}