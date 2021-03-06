<?php

namespace DesignPattern\Behavioral\ChainOfResponsibility\Discounts;

use DesignPattern\Structural\Composite\Budget;

class DiscountPerValue extends Discount 
{
    public function calculateDiscount(Budget $budget): float
    {
        if($budget->value > 500)
            return $budget->value * 0.5;

        return $this->nextDiscount->calculateDiscount($budget);
    }
}