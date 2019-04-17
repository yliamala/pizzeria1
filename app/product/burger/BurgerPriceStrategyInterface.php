<?php

namespace App\Product\Burger;


interface BurgerPriceStrategyInterface
{
    public function __construct(Burger $burger);
}