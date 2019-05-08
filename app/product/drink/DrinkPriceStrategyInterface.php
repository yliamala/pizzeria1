<?php

namespace App\Product\Drink;


use App\Product\PriceStrategyInterface;

interface DrinkPriceStrategyInterface extends PriceStrategyInterface
{
    public function __construct(Drink $drink);
}