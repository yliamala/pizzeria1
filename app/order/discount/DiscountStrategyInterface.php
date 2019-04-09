<?php

namespace App\Order\Discount;


interface DiscountStrategyInterface
{
    const DEFAULT_DISCOUNT = 10;
    const MAX_DISCOUNT = 20;

    public function getDiscount(): int;
}