<?php

namespace DesignPattern\Strategy;

use DesignPattern\Budget;
use DesignPattern\Strategy\Taxes\Tax;

class TaxCalculator
{
    public function calculate(Budget $budget, Tax $tax): float
    {
        return $tax->taxCalculation($budget);
    }
}