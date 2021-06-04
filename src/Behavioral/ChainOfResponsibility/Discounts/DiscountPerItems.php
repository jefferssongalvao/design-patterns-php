<?php

namespace DesignPattern\Behavioral\ChainOfResponsibility\Discounts;

use DesignPattern\Budget;

class DiscountPerItems extends Discount 
{
    public function calculateDiscount(Budget $budget): float
    {
        if($budget->items > 5)
            return $budget->value * 0.3;
            
        return $this->nextDiscount->calculateDiscount($budget);
    }
}