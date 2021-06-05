<?php

namespace DesignPattern\Behavioral\State;

use DesignPattern\Structural\Composite\Budget;
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
