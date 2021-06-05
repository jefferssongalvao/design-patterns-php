<?php

namespace DesignPattern\Behavioral\State;

use DesignPattern\Structural\Composite\Budget;
use DomainException;

abstract class BudgetState
{
    /**
     * @throws DomainException
     */
    abstract public function calculateExtraDiscount(Budget $budget): float;

    public function approves(Budget $budget): void
    {
        throw new DomainException("Este orçamento não pode ser aprovado");
    }

    public function reproves(Budget $budget): void
    {
        throw new DomainException("Este orçamento não pode ser reprovado");
    }

    public function finish(Budget $budget): void
    {
        throw new DomainException("Este orçamento não pode ser finalizado");
    }

}