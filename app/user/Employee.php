<?php

namespace App\User;


class Employee
{
    const COOK = 'cook';
    const MANAGER = 'manager';
    
    protected $type;
    protected $name;
    protected $allowPaid = false;
    protected $confirmedOrder = false;
    protected $deliveredOrder = false;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function getExcludeOrderStatus()
    {
        return $this->excludeOrderStatus;
    }

    public function viewOrders()
    {
        echo 'Forbid orders and amount and customer data';
    }

    public function getType()
    {
        return $this->type;
    }

    public function getAllowPaid()
    {
        return $this->allowPaid;
    }

    public function getConfirmedOrder()
    {
        return $this->confirmedOrder;
    }

    public function getDeliveredOrder()
    {
        return $this->deliveredOrder;
    }
}