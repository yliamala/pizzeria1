<?php

namespace App\Order;
// @todo change all namespaces to CamelCase and name of files

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
        // TODO: Implement valid() method.
    }

    public function next(): CartProductInterface
    {
        // TODO: Implement valid() method.
    }

    public function key()
    {
        // TODO: Implement valid() method.
    }

    public function valid()
    {
        // TODO: Implement valid() method.
    }

    public function rewind()
    {
        // TODO: Implement rewind() method.
    }

}