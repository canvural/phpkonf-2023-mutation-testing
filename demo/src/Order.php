<?php

namespace App;

use App\Discounts\Discount;

class Order
{
	public array $pizzas = [];

	public function addPizza(Pizza $pizza): void
	{
		$this->pizzas[] = ['pizza' => $pizza, 'discount' => null];
	}

	public function addPizzaWithDiscount(Pizza $pizza, Discount $discount): void
	{
		$this->pizzas[] = ['pizza' => $pizza, 'discount' => $discount];
	}

	public function getPizzas(): array
	{
		return $this->pizzas;
	}

	public function getPizzasCost(): float
	{
		$cost = 0.0;

		// Calculate final price of each pizza. Apply discount if it exists.
		foreach ($this->pizzas as $pizza) {
			$discount = $pizza['discount'];
			$cost += $pizza['pizza']->getCost() - ($discount ? $discount->getDiscount($pizza['pizza']) : 0.0);
		}

		return $cost;
	}

	public function getDiscounts(): array
	{
		$discounts = [];

		// Get all discounts from pizzas.
		foreach ($this->pizzas as $pizza) {
			/** @var Discount $discount */
			$discount = $pizza['discount'];
			if ($discount) {
				$discounts[] = [$discount->getName(), $discount->getDiscount($pizza['pizza'])];
			}
		}

		return $discounts;
	}

	public function getTotalCalories(): int
	{
		$calories = 0;

		foreach ($this->pizzas as $pizza) {
			$calories += $pizza['pizza']->getCalories();
		}

		return $calories;
	}
}
