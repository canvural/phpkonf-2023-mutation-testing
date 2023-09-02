<?php

namespace App\Ingredients;

class Olive implements Ingredient
{
    public function getName(): string
    {
        return strtolower('Olive');
    }

    public function getCost(): float
    {
        return 1.0;
    }

    public function getCalories(): int
    {
        return 15;
    }
}
