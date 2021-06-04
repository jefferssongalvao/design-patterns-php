<?php

namespace DesignPattern\Behavioral\TemplateMethod;

use DesignPattern\Budget;

class BrTax extends TwoRateTax
{
    public function shouldApplyMaxFee(Budget $budget): bool
    {
        return $budget->value > 500;
    }

    public function applyMaxFee(Budget $budget): float
    {
        return $budget->value * 0.05;
    }

    public function applyMinFee(Budget $budget): float
    {
        return $budget->value * 0.025;
    }
}