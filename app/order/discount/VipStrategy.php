<?php

namespace App\Order\Discount;


class VipStrategy implements DiscountStrategyInterface
{
    public function getDiscount(): int
    {
        return DiscountStrategyInterface::MAX_DISCOUNT;
    }
}