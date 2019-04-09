<?php

namespace App\Order;


use app\user\Customer;

class ValidationMinTotal implements ValidationInterface
{
    private $order;
    private $customer;
    private $minTotalAmount = 700;
    private $minTotalCustomer = [Customer::VIP => 500];

    public function __construct(Order $order, Customer $customer)
    {
        $this->order = $order;
        $this->customer = $customer;
    }
    
    private function validTotalAmount()
    {
        if (!empty($this->minTotalCustomer[$this->customer->getType()])) {
            $this->minTotalAmount = $this->minTotalCustomer[$this->customer->getType()];
        }
        if ($this->order->getTotalAmount() < $this->minTotalAmount) {
            throw new \Exception('Minimum order amount ' . $this->minTotalAmount);
        }
        return true;
    }
    
    public function valid(): bool
    {
        return $this->validTotalAmount();
    }
}