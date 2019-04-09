<?php

namespace App\Order;

class Cart implements CartInterface
{
    private $totalAmount = 0;
    /** @var CartItem[] */
    private $items = [];

    public function addItem(CartProductInterface $cartProduct, float $qty = 1): self
    {
        $this->items[$cartProduct->getHash()] = new CartItem($cartProduct, $qty);
        $this->totalAmount += $cartProduct->getPrice() * $qty;

        return $this;
    }

    public function removeItem(CartProductInterface $cartItem)
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

    public function current(): CartProductInterface
    {
        return current($this->items);
    }

    public function next(): CartProductInterface
    {
        return next($this->items);
    }

    public function key()
    {
        return key($this->items);
    }

    public function valid()
    {
        $key = key($this->items);
        return ($key !== NULL && $key !== FALSE);
    }

    public function rewind()
    {
        reset($this->items);
    }

}