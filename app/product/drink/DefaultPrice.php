<?php

namespace App\Product\Drink;


class DefaultPrice implements DrinkPriceStrategyInterface
{
    private $drink;

    public function __construct(Drink $drink)
    {
        $this->drink = $drink;
    }

    public function getPrice(): float
    {
        $price = 0;
        switch ($this->drink->getName()) {
            case 'coca-cola':
                switch ($this->drink->getVolume()) {
                    case '0.5':
                        $price += 10;
                        break;
                    case '1':
                        $price += 13;
                        break;
                    case '2':
                        $price += 15;
                        break;
                }
                break;
        }

        return $price;
    }
}