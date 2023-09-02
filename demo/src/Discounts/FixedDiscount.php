<?php

namespace App\Discounts;

use App\Pizza;

class FixedDiscount implements Discount
{
    public function getName(): string
    {
        return 'Fixed discount';
    }

    public function getDiscount(Pizza $pizza): float
    {
        return 2.0;
    }
}
