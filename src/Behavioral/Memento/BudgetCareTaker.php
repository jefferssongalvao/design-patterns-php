<?php

namespace DesignPattern\Behavioral\Memento;

class BudgetCareTaker
{
    /** @var BudgetMemento[] */
    protected array $budgetStates;
    public function __construct()
    {
        $this->budgetStates = [];
    }
    
    public function addMemento(BudgetMemento $budgetMemento): void
    {
        $this->budgetStates[] = $budgetMemento;
    }

    public function lastState(): BudgetMemento
    {
        if(empty($this->budgetStates)){
            return null;
        }
        
        $budgetMemento = end($this->budgetStates);
        unset($this->budgetStates[sizeof($this->budgetStates) - 1]);
        
        return $budgetMemento;
    }
}