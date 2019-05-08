<?php

namespace App\Product;


interface PriceStrategyInterface
{
    public function getPrice(): float;
}