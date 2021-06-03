<?php

namespace DesignPattern\State;

use DesignPattern\Budget;
use DesignPattern\State\BudgetState;
use DomainException;

class FinishedState extends BudgetState
{
    public function calculateExtraDiscount(Budget $budget): float
    {
        throw new DomainException("Um orçamento finalizado não pode gerar desconto.");
    }
}
