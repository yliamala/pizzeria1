<?php

namespace App\Order\Cart;

use App\Order\Cart\Item\Item;
use App\Order\Cart\Item\ItemInterface;
use App\Order\Cart\Item\ItemSumStrategyFactory;
use App\Order\Cart\Item\ItemSumStrategyFactoryInterface;

class Cart implements CartInterface
{
    private $totalAmount = 0;
    /** @var Item[] */
    private $items = [];
    /** @var ItemSumStrategyFactoryInterface */
    private $cartItemSumStrategyFactory;

    public function __construct()
    {
        $this->cartItemSumStrategyFactory = new ItemSumStrategyFactory();
    }


    public function addItem(ProductInterface $cartProduct, float $qty = 1): self
    {
        $surpriseStrategy = $this->cartItemSumStrategyFactory->getStrategy($this);
        $cartItem = new Item($cartProduct, $qty, $surpriseStrategy);
        $this->items[$cartProduct->getHash()] = $cartItem;
        $this->totalAmount += $cartItem->getSum();

        return $this;
    }

    public function removeItem(ProductInterface $cartItem)
    {
        unset($this->items[$cartItem->getHash()]);
        $this->reCalculateTotalAmount();

        return $this;
    }

    private function reCalculateTotalAmount()
    {
        $this->totalAmount = 0;
        if (!count($this->items)) return;

        foreach ($this->items as $item) {
            $this->totalAmount += $item->getSum();
        }
    }

    public function getTotalSum(): float
    {
        return $this->totalAmount;
    }

    public function getItems()
    {
        return $this->items;
    }

    public function current(): ItemInterface
    {
        return current($this->items);
    }

    public function next()
    {
        return next($this->items);
    }

    public function key(): string
    {
        return key($this->items);
    }

    public function valid(): bool
    {
        $key = key($this->items);
        return ($key !== NULL && $key !== FALSE);
    }

    public function rewind()
    {
        reset($this->items);
    }

}