<?php

use App\Ingredients\Olive;
use PHPUnit\Framework\TestCase;

class OliveTest extends TestCase
{
	public function testGetName()
	{
		$olive = new Olive();
		$this->assertEquals('olive', $olive->getName());
	}

	public function testGetCost()
	{
		$olive = new Olive();
		$this->assertEquals(1.0, $olive->getCost());
	}

	public function testGetCalories()
	{
		$olive = new Olive();
		$this->assertEquals(15, $olive->getCalories());
	}
}
