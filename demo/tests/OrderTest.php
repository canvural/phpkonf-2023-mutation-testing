<?php

namespace App\tests;

use App\Discounts\CalorieDiscount;
use App\Discounts\FixedDiscount;
use App\Discounts\PercentageDiscount;
use App\Discounts\ZeroDiscount;
use App\Ingredients\Dough;
use App\Ingredients\Olive;
use App\Ingredients\Tomato;
use App\Order;
use App\Pizza;
use PHPUnit\Framework\Attributes\IgnoreMethodForCodeCoverage;
use PHPUnit\Framework\TestCase;

class OrderTest extends TestCase
{
	public function testOrderWithPizzasWithNoIngredients()
	{
		$order = new Order();

		$order->addPizza(new Pizza());
		$order->addPizza(new Pizza());
		$order->addPizza(new Pizza());

		$this->assertEquals(150.0, $order->getPizzasCost());
		$this->assertCount(3, $order->getPizzas());
	}

	public function testOrderWithPizzasWithIngredients()
	{
		$order = new Order();

		$order->addPizza((new Pizza())->addIngredient(new Olive()));
		$order->addPizza((new Pizza())->addIngredient(new Tomato()));

		$this->assertEqualsWithDelta(102.0, $order->getPizzasCost(), 0.1);
	}

	public function testOrderWithPizzasWithCalories()
	{
		$order = new Order();

		$order->addPizza((new Pizza())->addIngredient(new Olive()));
		$order->addPizza((new Pizza())->addIngredient(new Tomato()));

		$this->assertIsInt($order->getTotalCalories());
		$this->assertEqualsWithDelta(102.0, $order->getPizzasCost(), 0.1);
	}

	public function testOrderWithPizzasWithIngredientsAndDiscounts()
	{
		$order = new Order();

		$order->addPizzaWithDiscount(
			(new Pizza())
				->addIngredient(new Olive())
				->addIngredient(new Tomato()),
			new FixedDiscount()
		);

		$order->addPizzaWithDiscount((new Pizza())->addIngredient(new Olive()), new CalorieDiscount());
		$order->addPizzaWithDiscount((new Pizza())->addIngredient(new Olive()), new ZeroDiscount());
		$order->addPizzaWithDiscount((new Pizza())->addIngredient(new Tomato()), new PercentageDiscount());

		$order->getDiscounts();
		$this->assertEquals(123.8, $order->getPizzasCost());
	}
}
