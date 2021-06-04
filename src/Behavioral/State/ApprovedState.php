<?php

namespace DesignPattern\Behavioral\State;

use DesignPattern\Budget;

class ApprovedState extends BudgetState
{
    public function calculateExtraDiscount(Budget $budget): float
    {
        return $budget->value * 0.02;
    }

    public function finish(Budget $budget): void
    {
        $budget->actualState = new FinishedState();
    }
}
