<?php

namespace App\Order;

class SaveOrder
{

    private $order;
    private $path = __DIR__ . '/ordersfile/';

    public function __construct(Order $order, ValidationInterface $valid)
    {
        if (!$valid->valid()) {
            throw new \Exception('Not valid!');
        }
        $this->order = $order;
    }

    public function save()
    {
        file_put_contents($this->path . time() . '.txt', serialize($this->order));
    }
}