<?php

namespace App\Service;


class DefaultPrice implements PriceServiceInterface
{
    public function getPrice(ServiceInterface $service): float
    {
        if ($service->getQtyPeople() <= 10) {
            return $service->getQtyPeople() * 500;
        } else {
            return $service->getQtyPeople() * 700;
        }
    }

}