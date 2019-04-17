<?php

namespace App\Product\Pizza;


interface PriceStrategyInterface
{
    public function getPrice(): float;
}