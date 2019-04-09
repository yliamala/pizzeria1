<?php

namespace App\Order;

class CartItem implements CartItemInterface
{
    /** @var float */
    private $qty;
    /** @var CartProductInterface */
    private $item;

    public function __construct(CartProductInterface $priceable, float $qty)
    {
        $this->qty = $qty;
        $this->item = $priceable;
    }

    public function getSum(): float
    {
        return $this->item->getPrice() * $this->qty;
    }

    public function getItem(): CartProductInterface
    {
        return $this->item;
    }

    public function getQuantity(): int
    {
        return $this->qty;
    }

}
