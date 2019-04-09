<?php

namespace App\Order\Discount;


class DefaultStrategy implements DiscountStrategyInterface
{
    public function getDiscount(): int
    {
        return DiscountStrategyInterface::DEFAULT_DISCOUNT;
    }
}