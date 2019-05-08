<?php

namespace App\Product\Drink;


class DefaultStrategyFactory implements StrategyFactoryInterface
{
    public function getStrategy(Drink $drink): DrinkPriceStrategyInterface
    {
        return new DefaultPrice($drink);
    }
}