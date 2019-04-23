<?php

namespace App\Order\Payment;


use App\Order\Order;
use App\User\Customer\CustomerInterface;

class Credit implements PaymentInterface
{
    public function enable(Order $order, CustomerInterface $customer): bool
    {
        return true;
    }

    public function getSetPaid(): bool
    {
        return false;
    }
}