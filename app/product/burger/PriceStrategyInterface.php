<?php

namespace App\Product\Burger;


class PriceStrategyInterface implements StrategyFactoryInterface
{
    public function getStrategy(Burger $burger): BurgerPriceStrategyInterface
    {
        return new DefaultPrice($burger);
    }
}