<?php

namespace App\Product\Drink;


interface PriceStrategyInterface
{
    public function getPrice(): float;
}
