<?php

namespace DesignPattern\Behavioral\Strategy;

use DesignPattern\Structural\Composite\Budget;
use DesignPattern\Structural\Decorator\Tax;

class TaxCalculator
{
    public function calculate(Budget $budget, Tax $tax): float
    {
        return $tax->taxCalculation($budget);
    }
}