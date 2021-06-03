<?php

namespace DesignPattern\State;

use DesignPattern\Budget;
use DesignPattern\State\BudgetState;
use DomainException;

class DisapprovedState extends BudgetState
{
    public function calculateExtraDiscount(Budget $budget): float
    {
        throw new DomainException("Um orçamento reprovado não pode gerar desconto.");
    }

    public function finish(Budget $budget): void
    {
        $budget->actualState = new FinishedState();
    }
}
