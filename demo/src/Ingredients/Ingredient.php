<?php

namespace App\Ingredients;

interface Ingredient
{
	public function getName(): string;

	public function getCost(): float;

	public function getCalories(): int;
}
