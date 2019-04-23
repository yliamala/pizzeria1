<?php

namespace App\Product\Drink;

use App\Order\CartProductInterface;
use App\Order\NameAble;

class Drink implements NameAble, CartProductInterface, BottleInterface
{
    private $volume;
    private $name;
    private $drinkPrice;

    public function __construct(StrategyFactoryInterface $strategyBuilder, string $name, float $volume)
    {
        $this->volume = $volume;
        $this->name = $name;
        $this->drinkPrice = $strategyBuilder->getStrategy($this);
    }

    public function getName()
    {
        return $this->name;
    }

    public function getVolume(): float
    {
        return $this->volume;
    }

    public function getPrice()
    {
        return $this->drinkPrice->getPrice();
    }

    public function getDescription()
    {
        return $this->getName() . ' ' . $this->getVolume() . ' l .';
    }

    public function getHash()
    {
        return uniqid();
    }
}