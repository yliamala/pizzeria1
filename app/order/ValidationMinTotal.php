<?php

namespace App\Order;



use App\User\Customer\CustomerInterface;

class ValidationMinTotal implements ValidationInterface
{
    private $order;
    private $customer;

    public function __construct(Order $order, CustomerInterface $customer)
    {
        $this->order = $order;
        $this->customer = $customer;
    }
    
    private function validTotalAmount(): bool
    {
        if ($this->customer->getMinAmountOrder() > $this->order->getTotalAmount()) {
            throw new \Exception('Minimum order amount ' . $this->customer->getMinAmountOrder());
        }
        return true;
    }
    
    public function valid(): bool
    {
        return $this->validTotalAmount();
    }
}