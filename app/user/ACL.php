<?php

namespace App\User;

use App\Order\Order;
use App\Order\Payment\Cash;
use App\User\Employee\EmployeeInterface;
use App\User\Employee\Manager;

class ACL
{
    public static function checkPermission(PermissionInterface $perm, UserPermissionInterface $customer): bool
    {
        return (in_array($perm, $customer->getPermissions()));
    }

    public static function checkStatus($status, EmployeeInterface $employee, Order $order): bool
    {
        // TODO ???
        if (in_array($status, $employee->getChangeStatus()) && $status == Order::PAID_STATUS && !($order->getPayment() instanceof Cash) && ($employee instanceof Manager)) {
            throw new \Exception('You can not change status.');
        }
        return (in_array($status, $employee->getChangeStatus()));
    }
}