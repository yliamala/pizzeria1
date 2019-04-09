<?php

namespace App\Product\Pizza;

use app\order\CartProductInterface;
use app\order\NameAble;
use app\order\PriceAble;
use app\product\InterfaceProduct;

class Pizza implements InterfaceProduct, NameAble, CartProductInterface
{
    private $dough;
    private $size;
    private $ingredient;
    private $type = InterfaceProduct::UNIQUE_PRODUCT_TYPE;

    public function __construct($dough, $size)
    {
        $this->dough = $dough;
        $this->size = $size;
    }

    public function addIngredient(Ingredient $ingredient)
    {
        $this->ingredient[] = $ingredient;
    }

    public function getDough()
    {
        return $this->dough;
    }

    public function getSize()
    {
        return $this->size;
    }

    public function getIngredient()
    {
        return $this->ingredient;
    }

    public function getPrice()
    {
        return (new PricePizza($this))->getPrice();
    }

    public function getWeight()
    {
        return (new WeightPizza($this))->getWeight();
    }

    public function getDescription(): string
    {
        $description = 'Pizza with ' . $this->getDough() . ' dough, size ' . $this->getSize() . ' ';

        if (count($this->getIngredient())) {
            foreach ($this->getIngredient() as $ingredient) {
                $description .= ', with ' . $ingredient->getName();
            }
        }

        $description .= '.';

        return $description;
    }

    public function getType()
    {
        return $this->type;
    }

    public function getName()
    {
        return self::class;
    }

    public function getHash()
    {
        return uniqid();
    }


}