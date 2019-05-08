<?php

namespace App\Order\Cart\Item;


use App\Order\Cart\ProductInterface;

interface ItemCostStrategyInterface
{
    public function getCost(ProductInterface $priceable): float;
}