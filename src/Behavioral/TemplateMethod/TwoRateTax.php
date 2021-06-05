<?php

namespace DesignPattern\Behavioral\TemplateMethod;

use DesignPattern\Structural\Composite\Budget;
use DesignPattern\Structural\Decorator\Tax;

abstract class TwoRateTax extends Tax
{
    public function taxSpecificCalculation(Budget $budget): float
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