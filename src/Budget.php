<?php

namespace DesignPattern;

use DesignPattern\Behavioral\State\BudgetState;
use DesignPattern\Behavioral\State\InApprovalState;

class Budget
{
    public float $value;
    public int $items;
    public BudgetState $actualState;

    public function __construct()
    {
        $this->actualState = new InApprovalState();
    }

    public function applyExtraDiscount(): void
    {
        $this->valor -= $this->actualState->calculateExtraDiscount($this);
    }

    public function approves(): void
    {
        $this->actualState->approves($this);
    }

    public function reproves(): void
    {
        $this->actualState->reproves($this);
    }

    public function finish(): void
    {
        $this->actualState->finish($this);
    }
}