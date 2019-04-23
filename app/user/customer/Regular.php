<?php

namespace App\User\Customer;



use App\User\Customer\Permission\OrderAdditionalProduct;
use App\User\Customer\Permission\ViewHistoryOrder;

class Regular implements CustomerInterface
{
    const MIN_AMOUNT_ORDER = 700;
    const MAX_AMOUNT_CASH = 5000;

    private $permissions = [];

    public function __construct()
    {
        $this->permissions = [
            new OrderAdditionalProduct(),
            new ViewHistoryOrder()
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