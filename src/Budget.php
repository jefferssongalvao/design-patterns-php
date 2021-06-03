<?php

namespace DesignPattern;

use DesignPattern\State\ApprovedState;
use DesignPattern\State\BudgetState;
use DesignPattern\State\InApprovalState;

class Budget
{
    public float $value;
    public int $items;
    public BudgetState $actualState;

    public function __construct()
    {
        $this->actualState = new InApprovalState();
    }

    public function applyExtraDiscount(Budget $budget): void
    {
        $this->valor -= $this->actualState->calculateExtraDiscount($this);
    }

    public function approves(Budget $budget): void
    {
        $this->actualState->approves($this);
    }

    public function reproves(Budget $budget): void
    {
        $this->actualState->reproves($this);
    }

    public function finish(Budget $budget): void
    {
        $this->actualState->finish($this);
    }
}