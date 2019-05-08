<?php

namespace App\Order\Cart\Item;

use App\Order\Cart\ProductInterface;

class DefaultItemCostStrategy implements ItemCostStrategyInterface
{
    public function getCost(ProductInterface $priceable): float
    {
        return $priceable->getPrice();
    }

}