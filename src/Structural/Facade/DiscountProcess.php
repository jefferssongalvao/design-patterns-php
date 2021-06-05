<?php

namespace DesignPattern\Structural\Facade;

use DesignPattern\Behavioral\ChainOfResponsibility\Discounts\Discount;
use DesignPattern\Structural\Composite\Budget;
use DesignPattern\Structural\Facade\Log\DiscountLog;
use DesignPattern\Structural\Facade\Validation\DiscountValidation;

class DiscountProcess
{
    private Budget $budget;

    public function __construct(Budget $budget)
    {
        $this->budget = $budget;
    }

    public function process(Discount $discount): void
    {
        // valida um desconto
        $discountValidate = new DiscountValidation($this->budget);
        if($discountValidate->validate($discount)) {
            echo "Desconto válido";
        }

        // Gerar LOG de um desconto
        $discountLog = new DiscountLog($this->budget);
        $discountLog->generateLog($discount);
    }    
}