<?php

namespace App\User\Employee;


use app\order\Order;
use App\User\Employee\Permission\ViewNewOrders;

class Cook implements EmployeeInterface
{
    private $changeOrderStatus = [Order::READY_STATUS];
    private $permissions = [];

    public function __construct()
    {
        $this->permissions = [
            new ViewNewOrders()
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