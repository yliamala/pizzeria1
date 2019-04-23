<?php

namespace App\User\Customer;

use App\User\UserPermissionInterface;

interface CustomerInterface extends UserPermissionInterface
{
    public function getMinAmountOrder(): float; // минимальная сумма заказа
}