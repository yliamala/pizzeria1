<?php

namespace App\User;

class Guest extends Customer
{
    protected $type = Customer::GUEST;
    protected $basicProduct = true;
}