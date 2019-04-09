<?php

namespace App\Order\Payment;


use app\order\Order;

abstract class AbstractPayment
{
    protected $name;
    protected $setPaid = false;

    public function enable(Order $order)
    {
        return true;
    }

    public function getName()
    {
        if (empty($this->name)) {
            throw new \Exception('Payment method name is not set');
        }
        return $this->name;
    }

    public function getSetPaid()
    {
        return $this->setPaid;
    }
}