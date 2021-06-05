<?php

namespace DesignPattern\Behavioral\Strategy\Taxes;

use DesignPattern\Structural\Composite\Budget;
use DesignPattern\Structural\Decorator\Tax;

class IcmsTax extends Tax
{
    public function taxSpecificCalculation(Budget $budget): float
    {
        return $budget->value * 0.1;
    }
}