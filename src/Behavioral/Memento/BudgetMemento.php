<?php

namespace DesignPattern\Behavioral\Memento;

use DesignPattern\Behavioral\State\BudgetState;

class BudgetMemento 
{
    protected BudgetState $budgetState;
    public function __construct(BudgetState $budgetState)
    {
        $this->budgetState = $budgetState;
    }
    
    public function getBudgetState(): BudgetState
    {
        return $this->budgetState;
    }
}