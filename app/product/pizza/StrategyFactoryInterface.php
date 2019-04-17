<?php

namespace App\Product\Pizza;


interface StrategyFactoryInterface
{
    public function getStrategy(Pizza $pizza): PizzaPriceStrategyInterface;
}