<?php

namespace DesignPattern\State;

use DesignPattern\Budget;
use DesignPattern\State\BudgetState;

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
