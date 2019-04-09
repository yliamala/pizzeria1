<?php

namespace App\User;


class Regular extends Customer
{
    protected $type = Customer::REGULAR;
    protected $basicProduct = true;
    protected $additionalProduct = true;
    protected $historyOrder = true;
}