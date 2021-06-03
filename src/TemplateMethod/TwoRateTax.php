<?php

namespace DesignPattern\TemplateMethod\Tax;

use DesignPattern\Budget;
use DesignPattern\Strategy\Taxes\Tax;

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