<?php

namespace App\Order\Cart\Item;

use App\Order\Cart\CartInterface;

interface ItemSumStrategyFactoryInterface
{
    public function getStrategy(CartInterface $cart): ItemCostStrategyInterface;
}