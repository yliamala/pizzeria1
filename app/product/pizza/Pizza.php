<?php

namespace App\Product\Pizza;

use app\Order\Cart\ProductInterface;
use app\order\NameAble;

class Pizza implements NameAble, ProductInterface
{
    CONST DOUGH_STANDARD = 'standard';
    CONST DOUGH_THIN = 'thin';

    private $dough;
    private $size;
    private $ingredient;
    private $priceStrategy;

    public function __construct(StrategyFactoryInterface $strategyBuilder, $dough, $size)
    {
        $this->dough = $dough;
        $this->size = $size;
        $this->priceStrategy = $strategyBuilder->getStrategy($this);
    }

    public function addIngredient(Ingredient $ingredient)
    {
        $this->ingredient[] = $ingredient;
    }

    public function getPrice(): float
    {
        return $this->priceStrategy->getPrice();
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

    public function getName()
    {
        return self::class;
    }

    public function getHash()
    {
        return uniqid();
    }


}