<?php

namespace App\Discounts;

use App\Pizza;

class CalorieDiscount implements Discount
{
    public function getName(): string
    {
        return 'Calorie discount';
    }

    public function getDiscount(Pizza $pizza): float
    {
        return $pizza->getCalories() * 0.6;
    }
}
