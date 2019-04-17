<?php

namespace App\Product\Burger;


class FreePrice implements BurgerPriceStrategyInterface
{
    public function __construct(Burger $burger)
    {
    }

    public function getPrice(): float
    {
        return 0;
    }
}