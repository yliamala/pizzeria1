<?php

namespace App\Product\Pizza;


interface PriceStrategyInterface extends \App\Product\PriceStrategyInterface
{
    public function __construct(Pizza $pizza);
}