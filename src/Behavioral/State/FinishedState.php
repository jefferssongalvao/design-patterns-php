<?php

namespace DesignPattern\Behavioral\State;

use DesignPattern\Structural\Composite\Budget;
use DomainException;

class FinishedState extends BudgetState
{
    public function calculateExtraDiscount(Budget $budget): float
    {
        throw new DomainException("Um orçamento finalizado não pode gerar desconto.");
    }
}
