<?php

namespace App;

use App\Ingredients\Ingredient;

class Pizza
{
	/**
	 * @var Ingredient[]
	 */
	private array $ingredients = [];

	public function __construct()
	{
		$this->addIngredient(new Ingredients\Dough());
	}

	public function addIngredient(Ingredient $ingredient, int $count = 1): self
	{
		for ($i = 0; $i < $count; $i++) {
			$this->ingredients[] = $ingredient;
		}

		return $this;
	}

	public function getCost(): float
	{
		$cost = 0.0;

		foreach ($this->ingredients as $ingredient) {
			$cost += $ingredient->getCost();
		}

		return $cost;
	}

	public function getCalories(): int
	{
		$calories = 0;

		foreach ($this->ingredients as $ingredient) {
			$calories += $ingredient->getCalories();
		}

		return $calories;
	}
}
