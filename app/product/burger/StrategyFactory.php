<?php

namespace App\Product\Burger;


class StrategyFactory implements StrategyFactoryInterface
{
    public function getStrategy(Burger $burger): BurgerPriceStrategyInterface
    {
        return new DefaultPrice($burger);
    }
}