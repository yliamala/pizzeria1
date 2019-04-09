<?php
namespace App\Product\Pizza;


class PricePizza
{
    private $price = 0;
    private $pizza;
    
    public function __construct(Pizza $pizza)
    {
        $this->pizza = $pizza;
        $this->setPriceBySize();
        $this->setPriceByDough();
        $this->setIngredientPrice();
    }

    public function getPrice()
    {
        return $this->price;
    }

    private function setPriceByDough()
    {
        switch ($this->pizza->getDough()) {
            case 'standard':
                $this->price += 50;
                break;
            case 'thin':
                $this->price += 30;
                break;
            default:
                throw new \Exception($this->pizza->getDough() . ' dough is not exist.');
                break;
        }
    }

    private function setPriceBySize()
    {
        switch ($this->pizza->getSize()) {
            case 26:
                $this->price += 26;
                break;
            case 30:
                $this->price += 30;
                break;
            case 40:
                $this->price += 40;
                break;
        }
    }

    private function setIngredientPrice()
    {
        if (empty($this->pizza->getIngredient())) return;

        foreach ($this->pizza->getIngredient() as $ingredient) {
            $this->price += $ingredient->getPrice();
        }
    }
}