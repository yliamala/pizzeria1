<?php

namespace App\Order\Cart\Item;

use App\Order\Cart\ProductInterface;

class FreeItemCostStrategy implements ItemCostStrategyInterface
{
    public function getCost(ProductInterface $priceable): float
    {
        return 0;
    }

}