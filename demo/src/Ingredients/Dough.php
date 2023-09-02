<?php

namespace App\Ingredients;

class Dough implements Ingredient
{
	public function getName(): string
	{
		return strtolower('Dough');
	}

	public function getCost(): float
	{
		return 50.0;
	}

	public function getCalories(): int
	{
		return 100;
	}
}
