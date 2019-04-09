<?php

namespace App\Product\Drink;


class StrategyFactory implements StrategyFactoryInterface
{
    public function getStrategy(Drink $drink): DrinkPriceStrategyInterface
    {
        return new DefaultPrice($drink);
    }
}