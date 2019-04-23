<?php

namespace App\User\Customer;


class Guest implements CustomerInterface
{
    const MIN_AMOUNT_ORDER = 700;
    const MAX_AMOUNT_CASH = 5000;

    private $permissions = [];

    public function getMinAmountOrder(): float
    {
        return self::MIN_AMOUNT_ORDER;
    }

    public function getPermissions(): array
    {
        return $this->permissions;
    }
}