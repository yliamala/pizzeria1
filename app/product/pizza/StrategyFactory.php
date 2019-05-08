<?php

namespace App\Product\Pizza;


class StrategyFactory implements StrategyFactoryInterface
{
    public function getStrategy(Pizza $pizza): PriceStrategyInterface
    {
        return new DefaultPrice($pizza);
    }
}