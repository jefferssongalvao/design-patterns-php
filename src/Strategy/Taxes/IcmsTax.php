<?php

namespace DesignPattern\Strategy\Taxes;

use DesignPattern\Strategy\Budget;
use DesignPattern\Strategy\Taxes\Tax;

class IcmsTax implements Tax
{
    public function taxCalculation(Budget $budget): float
    {
        return $budget->value * 0.1;
    }
}