<?php

namespace App\User;


class Manager extends Employee
{
    protected $deliveredOrder = true;
    protected $type = Employee::MANAGER;
    protected $allowPaid = true;

    public function viewOrders()
    {
        echo 'Allow Orders with amount and customer data';
    }
}