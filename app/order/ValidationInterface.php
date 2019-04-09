<?php

namespace App\Order;


interface ValidationInterface
{
    public function valid(): bool;

}