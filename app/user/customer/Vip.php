<?php

namespace App\User\Customer;


use App\User\Customer\Permission\OrderAdditionalProduct;
use App\User\Customer\Permission\OrderUniqueProduct;
use App\User\Customer\Permission\ViewHistoryOrder;
use App\User\Customer\Permission\ViewStatusCurrentOrder;

class Vip implements CustomerInterface
{
    const MIN_AMOUNT_ORDER = 500;

    private $permissions = [];

    public function __construct()
    {
        $this->permissions = [
            new OrderAdditionalProduct(),
            new OrderUniqueProduct(),
            new ViewHistoryOrder(),
            new ViewStatusCurrentOrder()
        ];
    }

    public function getMinAmountOrder(): float
    {
        return self::MIN_AMOUNT_ORDER;
    }

    public function getPermissions(): array
    {
        return $this->permissions;
    }
}