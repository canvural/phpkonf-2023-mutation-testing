<?php

namespace App\Ingredients;

class Tomato implements Ingredient
{
    public function getName(): string
    {
		return strtolower('Tomato');
    }

    public function getCost(): float
    {
		return 1.0;
    }

    public function getCalories(): int
    {
		return 10;
    }
}
