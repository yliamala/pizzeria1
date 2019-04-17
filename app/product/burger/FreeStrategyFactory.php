<?php

namespace App\Product\Burger;


class FreeStrategyFactory implements StrategyFactoryInterface
{
    public function getStrategy(Burger $burger): BurgerPriceStrategyInterface
    {
        return new FreePrice($burger);
    }
}