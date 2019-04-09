<?php

namespace App\Product\Pizza;


class Ingredient
{
    private $name;
    private $weight = 0;
    private $price = 0;

    public function __construct($name)
    {
        $this->name = $name;
        $this->setPriceWeight();

    }

    private function setPriceWeight()
    {
        switch ($this->name) {
            case 'onions':
                $this->weight = 20;
                $this->price = 30;
                break;
            case 'pineapples':
                $this->weight = 25;
                $this->price = 35;
                break;
            case 'jalapenas':
                $this->weight = 34;
                $this->price = 39;
                break;
            case 'olives':
                $this->weight = 10;
                $this->price = 21;
                break;
            case 'tomatoes':
                $this->weight = 14;
                $this->price = 18;
                break;
            default:
                throw new \Exception("Ingredient $this->name is not exist.");
                break;
        }
    }

    public function getName()
    {
        return $this->name;
    }

    public function getWeight()
    {
        return $this->weight;
    }

    public function getPrice()
    {
        return $this->price;
    }
}