<?php

namespace App\Order\Cart\Item;

use App\Order\Cart\CartInterface;

class ItemSumStrategyFactory implements ItemSumStrategyFactoryInterface
{
    public function getStrategy(CartInterface $cart): ItemCostStrategyInterface
    {
        if ($cart->getTotalSum() >= 1000) {
            return new FreeItemCostStrategy();
        }

        return new DefaultItemCostStrategy();
    }

}