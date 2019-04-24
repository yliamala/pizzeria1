<?php

namespace App\Service;

use App\Order\CartProductInterface;
use App\Order\NameAble;

interface ServiceInterface extends CartProductInterface, NameAble
{
    public function getQtyPeople(): int;
}