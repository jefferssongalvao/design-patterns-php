<?php

namespace DesignPattern\Behavioral\Strategy;

use DesignPattern\Behavioral\Strategy\Taxes\Tax;
use DesignPattern\Budget;

class TaxCalculator
{
    public function calculate(Budget $budget, Tax $tax): float
    {
        return $tax->taxCalculation($budget);
    }
}