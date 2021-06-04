<?php

namespace DesignPattern\Behavioral\Strategy\Taxes;

use DesignPattern\Budget;

class IcmsTax implements Tax
{
    public function taxCalculation(Budget $budget): float
    {
        return $budget->value * 0.1;
    }
}