<?php

namespace DesignPattern\ChainOfResponsibility\Discounts;

use DesignPattern\Budget;
use DesignPattern\ChainOfResponsibility\Discounts\Discount;

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