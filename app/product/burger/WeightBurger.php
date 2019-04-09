<?php

namespace App\Product\Burger;


class WeightBurger
{
    private $weight = 40;
    private $burger;

    public function __construct(Burger $burger)
    {
        $this->burger = $burger;
    }

    public function getWeight()
    {
        $this->setWeightByCheese();
        $this->setWeightByDoubleCutlet();

        return $this->weight;
    }

    private function setWeightByCheese()
    {
        if ($this->burger->getCheese()) {
            $this->weight += 5;
        }
    }

    private function setWeightByDoubleCutlet()
    {
        if ($this->burger->getDoubleCutlet()) {
            $this->weight += 20;
        }
    }
}