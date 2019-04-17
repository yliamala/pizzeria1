<?php

namespace App\Product\Pizza;


interface PizzaPriceStrategyInterface extends PriceStrategyInterface
{
    public function __construct(Pizza $pizza);
}