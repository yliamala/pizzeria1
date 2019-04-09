<?php

namespace App\User;


class Vip extends Customer
{
    protected $type = Customer::VIP;
    protected $basicProduct = true;
    protected $additionalProduct = true;
    protected $uniqueProduct = true;
    protected $historyOrder = true;
    protected $viewStatusOrder = true;
    protected $minAmount = true;
    protected $alwaysCash = true;
}