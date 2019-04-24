<?php

namespace App\User\Employee;


use App\Order\Order;
use App\User\Employee\Permission\ViewAllOrders;
use App\User\Employee\Permission\ViewAmountOrder;
use App\User\Employee\Permission\ViewContactOrder;

class Manager implements EmployeeInterface
{
    private $changeOrderStatus = [Order::PAID_STATUS, Order::DELIVERED_STATUS];
    private $permissions = [];

    public function __construct()
    {
        $this->permissions = [
            new ViewAllOrders(),
            new ViewAmountOrder(),
            new ViewContactOrder()
        ];
    }

    public function getChangeStatus(): array
    {
        return $this->changeOrderStatus;
    }

    public function getPermissions(): array
    {
        return $this->permissions;
    }
}