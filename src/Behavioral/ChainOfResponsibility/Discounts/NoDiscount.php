<?php

namespace DesignPattern\Behavioral\ChainOfResponsibility\Discounts;

use DesignPattern\Structural\Composite\Budget;

class NoDiscount extends Discount 
{
    public function __construct()
    {
        parent::__construct(null);
    }
    
    public function calculateDiscount(Budget $budget): float
    {
        return 0;
    }
}