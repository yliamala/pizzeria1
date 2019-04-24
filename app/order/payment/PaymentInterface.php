<?php

namespace App\Order\Payment;


use App\Order\Order;
use App\User\Customer\CustomerInterface;

interface PaymentInterface
{

    public function enable(Order $order, CustomerInterface $customer): bool;
}