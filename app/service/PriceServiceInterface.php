<?php

namespace App\Service;


interface PriceServiceInterface
{
    public function getPrice(ServiceInterface $service): float;
}