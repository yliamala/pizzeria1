<?php

namespace App\Product\Burger;


class DefaultPrice implements BurgerPriceStrategyInterface
{
    private $price = 80;
    private $burger;

    public function __construct(Burger $burger)
    {
        $this->burger = $burger;
        $this->setPriceByCheese();
        $this->setPriceByDoubleCutlet();
    }

    private function setPriceByCheese()
    {
        if ($this->burger->getCheese()) {
            $this->price += 20;
        }
    }

    private function setPriceByDoubleCutlet()
    {
        if ($this->burger->getDoubleCutlet()) {
            $this->price += 30;
        }
    }

    public function getPrice()
    {
        return $this->price;
    }
}