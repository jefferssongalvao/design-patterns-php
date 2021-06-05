<?php

namespace DesignPattern\Structural\Facade\Validation;

use DesignPattern\Behavioral\ChainOfResponsibility\Discounts\Discount;
use DesignPattern\Structural\Composite\Budget;

class DiscountValidation
{
    private Budget $budget;
    public function __construct(Budget $budget)
    {
        $this->budget = $budget;    
    }
    public function validate(Discount $discount): bool
    {
        echo "Validando o Desconto";
        return $discount->calculateDiscount($this->budget) >= 0;
    }

}