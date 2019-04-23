<?php

namespace App\Product\Burger;

use App\Order\CartProductInterface;
use App\Order\NameAble;

class Burger implements NameAble, CartProductInterface
{
    private $bun;
    private $degreeRoasting;
    private $cheese = false;
    private $doubleCutlet = false;
    private $price;

    public function __construct(StrategyFactoryInterface $strategyBuilder, $bun, $degreeRoasting)
    {
        $this->bun = $bun;
        $this->degreeRoasting = $degreeRoasting;
        $this->price = $strategyBuilder->getStrategy($this);
    }

    public function getCheese()
    {
        return $this->cheese;
    }

    public function addCheese()
    {
        $this->cheese = true;
        return $this;
    }

    public function removeCheese()
    {
        return $this->cheese = false;
    }

    public function getDoubleCutlet()
    {
        return $this->doubleCutlet;
    }

    public function getBun()
    {
        return $this->bun;
    }

    public function getDegreeRoasting()
    {
        return $this->degreeRoasting;
    }

    public function addDoubleCutlet()
    {
        $this->doubleCutlet = true;
        return $this;
    }

    public function removeDoubleCutlet()
    {
        $this->doubleCutlet = false;
    }

    public function getPrice()
    {
        return $this->price->getPrice();
    }

    public function getWeight()
    {
        return (new WeightBurger($this))->getWeight();
    }

    public function getDescription()
    {
        $description = 'Burger with ' . $this->getBun() . ' bun, ' ;
        if ($this->getDoubleCutlet()) $description .= 'double ';
        $description .= 'cutlet ' . $this->getDegreeRoasting() . ' roasting ';
        if ($this->getCheese()) $description .= 'with cheese';
        return $description;
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