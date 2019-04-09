<?php

// @todo split to files by each class/interface
// @todo make analog to other products
namespace App\Product\Drink;

interface PriceStrategyInterface
{
    public function getPrice(): float;
}

interface DrinkPriceStrategyInterface extends PriceStrategyInterface
{
    public function __construct(Drink $drink);
}

interface StrategyFactoryInterface
{
    public function getStrategy(Drink $drink): DrinkPriceStrategyInterface;
}

class StrategyFactory implements StrategyFactoryInterface
{
    public function getStrategy(Drink $drink): DrinkPriceStrategyInterface
    {
        return new DefaultPrice($drink);
    }
}

class FreeStrategyFactory implements StrategyFactoryInterface
{
    public function getStrategy(Drink $drink): DrinkPriceStrategyInterface
    {
        return new FreePrice($drink);
    }
}

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

class FreePrice implements DrinkPriceStrategyInterface
{
    public function __construct(Drink $drink)
    {
    }

    public function getPrice(): float
    {
        return 0;
    }

}