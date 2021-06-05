<?php

namespace DesignPattern\Behavioral\Strategy\Taxes;

use DesignPattern\Budget;
use DesignPattern\Structural\Decorator\Tax;

class IssTax extends Tax
{
    public function taxSpecificCalculation(Budget $budget): float
    {
        return $budget->value * 0.06;
    }
}