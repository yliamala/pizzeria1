<?php

namespace App\Order\Payment;


use App\Order\Order;
use App\User\Customer\CustomerInterface;
use App\User\Customer\Vip;

class Cash implements PaymentInterface
{
    const MAX_AMOUNT = 5000;

    public function enable(Order $order, CustomerInterface $customer): bool
    {
        if ($customer instanceof Vip) {
            return true;
        }

        if ($order->getTotalAmount() >= self::MAX_AMOUNT) {
            return true;
        }
        return false;
    }

    public function getSetPaid(): bool
    {
        return true;
    }
}