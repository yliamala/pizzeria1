<?php

namespace App\Product\Drink;


class FreeStrategyFactory implements StrategyFactoryInterface
{
    public function getStrategy(Drink $drink): DrinkPriceStrategyInterface
    {
        return new FreePrice($drink);
    }
}