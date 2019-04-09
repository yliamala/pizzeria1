<?php
namespace App\Product\Pizza;


class WeightPizza
{
    private $weight = 0;
    private $pizza = 0;

    public function __construct(Pizza $pizza)
    {
        $this->pizza = $pizza;
    }

    public function getWeight()
    {
        $this->addWeightBySize();
        $this->addWeightByDough();
        $this->addIngredientWeight();

        return $this->weight;
    }

    private function addWeightByDough()
    {
        switch ($this->pizza->getDough()) {
            case 'standard':
                $this->weight += 50;
                break;
            case 'thin':
                $this->weight += 30;
                break;
            default:
                throw new \Exception($this->pizza->getDough() . ' dough is not exist.');
                break;
        }
    }

    private function addWeightBySize()
    {
        switch ($this->pizza->getSize()) {
            case 26:
                $this->weight += 26;
                break;
            case 30:
                $this->weight += 30;
                break;
            case 40:
                $this->weight += 40;
                break;
        }
    }

    private function addIngredientWeight()
    {
        if (empty($this->pizza->getIngredient())) return;

        foreach ($this->pizza->getIngredient() as $ingredient) {
            $this->weight += $ingredient->getWeight();
        }
    }
}