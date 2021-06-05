<?php

namespace DesignPattern\Behavioral\ChainOfResponsibility\Discounts;

use DesignPattern\Structural\Composite\Budget;

class DiscountPerItems extends Discount 
{
    public function calculateDiscount(Budget $budget): float
    {
        if(isset($budget->items) && count($budget->items) > 5)
            return $budget->value * 0.3;
            
        return $this->nextDiscount->calculateDiscount($budget);
    }
}