<?php

namespace DesignPattern\Strategy\Taxes;

use DesignPattern\Strategy\Budget;

class IssTax implements Tax
{
    public function taxCalculation(Budget $budget): float
    {
        return $budget->value * 0.06;
    }
}