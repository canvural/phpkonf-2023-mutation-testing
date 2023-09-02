<?php

namespace App\Discounts;

use App\Discounts\Discount;
use App\Pizza;

class ZeroDiscount implements Discount
{
    public function getName(): string
    {
        return 'Zero discount';
    }

    public function getDiscount(Pizza $pizza): float
    {
        return 0.0;
    }
}
