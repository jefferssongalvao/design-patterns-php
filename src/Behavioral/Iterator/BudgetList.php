<?php

namespace DesignPattern\Behavioral\Iterator;

use DesignPattern\Structural\Composite\Budget;

class BudgetList implements \IteratorAggregate
{
    /** @var Budget[] */
    private array $budgetList;
    public function __construct()
    {
        $this->budgetList = [];
    }

    public function addBudget(Budget $budget): void
    {
        $this->budgetList[] = $budget;
    }

    public function getIterator()
    {
        return new \ArrayIterator($this->budgetList);
    }
}