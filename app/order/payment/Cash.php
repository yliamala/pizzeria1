<?php

namespace App\Order\Payment;


use app\order\Order;
use app\user\Vip;

class Cash extends AbstractPayment
{
    const MAX_AMOUNT = 5000;

    protected $name = 'cash';
    protected $setPaid = true;

    public function enable(Order $order)
    {
        $customer = new Vip('Test', '09872227733');
        if ($order->getTotalAmount() >= self::MAX_AMOUNT && !$customer->getAlwaysCash()) {
            return false;
        }
        return true;
    }
}