<?php

namespace App\Service;

use App\Order\Cart\ProductInterface;
use App\Order\NameAble;

interface ServiceInterface extends ProductInterface, NameAble
{
    public function getQtyPeople(): int;
}