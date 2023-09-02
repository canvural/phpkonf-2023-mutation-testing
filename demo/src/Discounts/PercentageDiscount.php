<?php

namespace App\Discounts;

use App\Pizza;

class PercentageDiscount implements Discount
{
    public function getName(): string
    {
        return 'Percentage discount';
    }

    public function getDiscount(Pizza $pizza): float
    {
        return $pizza->getCost() * 0.2;
    }
}
