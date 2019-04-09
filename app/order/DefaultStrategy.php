<?php

// @todo refactor

namespace App\Order;

interface DiscountStrategyInterface
{
    const DEFAULT_DISCOUNT = 10;
    const MAX_DISCOUNT = 20;

    public function getDiscount(): int;
}

class DefaultStrategy implements DiscountStrategyInterface
{
    public function getDiscount(): int
    {
        return DiscountStrategyInterface::DEFAULT_DISCOUNT;
    }
}

class VipStrategy implements DiscountStrategyInterface
{
    public function getDiscount(): int
    {
        return DiscountStrategyInterface::MAX_DISCOUNT;
    }

}