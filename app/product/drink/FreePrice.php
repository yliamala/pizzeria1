<?php

namespace App\Product\Drink;


class FreePrice implements DrinkPriceStrategyInterface
{
    public function __construct(Drink $drink)
    {
    }

    public function getPrice(): float
    {
        return 0;
    }

}