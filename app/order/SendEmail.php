<?php

namespace App\Order;


class SendEmail
{
    private $order;

    public function __construct(Order $order)
    {
        if ($order->getPizzeria()->getSendEmail() === false) return;
        $this->order = $order;
        $this->sendEmail();
    }

    public function sendEmail()
    {
        echo 'Send email' . "\n";
        // send email by data order $this->order
    }
}