<?php

// @todo make analog to other products
namespace App\Product\Drink;


interface PriceStrategyInterface
{
    public function getPrice(): float;
}
