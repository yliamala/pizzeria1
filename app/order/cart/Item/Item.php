<?php

namespace App\Order\Cart\Item;

use App\Order\Cart\ProductInterface;

class Item implements ItemInterface
{
    /** @var float */
    private $qty;
    /** @var ProductInterface */
    private $item;
    /** @var ItemCostStrategyInterface */
    private $cartItemSumStrategy;

    public function __construct(ProductInterface $priceable, float $qty, ItemCostStrategyInterface $cartItemSumStrategy)
    {
        $this->qty = $qty;
        $this->item = $priceable;
        $this->cartItemSumStrategy = $cartItemSumStrategy;
    }

    public function getSum(): float
    {
        return $this->cartItemSumStrategy->getCost($this->item) * $this->qty;
    }

    public function getItem(): ProductInterface
    {
        return $this->item;
    }

    public function getQuantity(): int
    {
        return $this->qty;
    }

}
