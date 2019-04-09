<?php

namespace App\User;


use app\order\Order;

class Cook extends Employee
{
    protected $confirmedOrder = true;
    protected $type = Employee::COOK;
    protected $excludeOrderStatus = [Order::SUBMITTED_STATUS];

    public function viewOrders()
    {
        echo 'Allow Submitted orders without amount and customer data';
    }

}