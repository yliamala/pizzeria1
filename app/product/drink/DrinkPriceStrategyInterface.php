<?php

namespace App\Product\Drink;


interface DrinkPriceStrategyInterface extends PriceStrategyInterface
{
    public function __construct(Drink $drink);
}