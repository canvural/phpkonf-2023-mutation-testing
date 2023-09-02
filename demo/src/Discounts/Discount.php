<?php

namespace App\Discounts;

use App\Pizza;

interface Discount
{
	public function getName(): string;

	public function getDiscount(Pizza $pizza): float;
}
