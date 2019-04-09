<?php

namespace App\Product\Drink;


interface StrategyFactoryInterface
{
    public function getStrategy(Drink $drink): DrinkPriceStrategyInterface;
}