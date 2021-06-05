<?php

namespace DesignPattern\Structural\Proxy;

use DesignPattern\Structural\Composite\Budget;
use DesignPattern\Structural\Composite\BudgetableItem;
use DomainException;

class BudgetCache extends Budget
{
    private float $valueCache;
    private Budget $budget;

    public function __construct(Budget $budget)
    {
        $this->valueCache = 0;
        $this->budget = $budget;
    }

    public function addItem(BudgetableItem $item): void
    {
        throw new DomainException("Não pode adicionar item a um cache de orçamento.");
    }

    public function value(): float
    {
        if($this->valueCache === 0){
            $this->valueCache = $this->budget->value();
        }
        return $this->valueCache;
    }

} 
