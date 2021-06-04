<?php

namespace DesignPattern\Behavioral\TemplateMethod;

use DesignPattern\Behavioral\Strategy\Taxes\Tax;
use DesignPattern\Budget;

abstract class TwoRateTax implements Tax
{
    public function taxCalculation(Budget $budget): float
    {
        if($this->shouldApplyMaxFee($budget)) {
            return $this->applyMaxFee($budget);
        }
        return $this->applyMinFee($budget);
    }

    abstract function shouldApplyMaxFee(Budget $budget): bool;
    abstract function applyMaxFee(Budget $budget): float;
    abstract function applyMinFee(Budget $budget): float;
}