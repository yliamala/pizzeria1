<?php

namespace App\Order;


class SurpriseStrategy
{
    private $maxAmount = 1000;
    private $order;
    private $surprise = false;

    public function __construct(Order $order)
    {
        $this->order = $order;
        $this->setSurprise();
    }

    public function getDiscount()
    {
        return $this->surprise;
    }

    public function setSurprise()
    {
        if ($this->order->getTotalAmount() >= $this->maxAmount) {
            $this->surprise = true;
        }
    }
}