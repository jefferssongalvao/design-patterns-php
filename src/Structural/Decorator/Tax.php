<?php

namespace DesignPattern\Structural\Decorator;

use DesignPattern\Budget;

abstract class Tax
{
    private ?Tax $otherTax;
    public function __construct(Tax $tax = null)
    {
        $this->otherTax = $tax;
    }
    abstract public function taxSpecificCalculation(Budget $budget): float;

    public function taxCalculation(Budget $budget): float
    {
        return $this->taxSpecificCalculation($budget) + $this->otherTaxCalculation($budget);
    }

    private function otherTaxCalculation(Budget $budget)
    {
        return $this->otherTax === null ? 0 : $this->otherTax->taxCalculation($budget);
    }
}