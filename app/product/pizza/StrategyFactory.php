<?php

namespace App\Product\Pizza;


class StrategyFactory implements StrategyFactoryInterface
{
    public function getStrategy(Pizza $pizza): PizzaPriceStrategyInterface
    {
        return new DefaultPrice($pizza);
    }
}