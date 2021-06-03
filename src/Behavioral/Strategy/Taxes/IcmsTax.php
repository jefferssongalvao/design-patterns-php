<?php

namespace DesignPattern\Strategy\Taxes;

use DesignPattern\Budget;
use DesignPattern\Strategy\Taxes\Tax;

class IcmsTax implements Tax
{
    public function taxCalculation(Budget $budget): float
    {
        return $budget->value * 0.1;
    }
}