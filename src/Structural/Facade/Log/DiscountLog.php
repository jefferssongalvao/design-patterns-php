<?php

namespace DesignPattern\Structural\Facade\Log;

use DesignPattern\Behavioral\ChainOfResponsibility\Discounts\Discount;
use DesignPattern\Structural\Composite\Budget;

class DiscountLog
{
    private Budget $budget;
    public function __construct(Budget $budget)
    {
        $this->budget = $budget;    
    }
    public function generateLog(Discount $discount)
    {
        echo "Gerando Log de Desconto" . $discount->calculateDiscount($this->budget);
    }

}