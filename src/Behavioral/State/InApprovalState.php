<?php

namespace DesignPattern\Behavioral\State;

use DesignPattern\Budget;

class InApprovalState extends BudgetState
{
    public function calculateExtraDiscount(Budget $budget): float
    {
        return $budget->value * 0.05;
    }

    public function approves(Budget $budget): void
    {
        $budget->actualState = new ApprovedState();
    }

    public function reproves(Budget $budget): void
    {
        $budget->actualState = new DisapprovedState();
    }

    public function finish(Budget $budget): void
    {
        $budget->actualState = new FinishedState();
    }
}
