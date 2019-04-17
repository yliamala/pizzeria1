<?php

namespace App\Product\Burger;


interface StrategyFactoryInterface
{
    public function getStrategy(Burger $burger): BurgerPriceStrategyInterface;
}