<?php

namespace DesignPattern\Structural\Composite;

use BudgetItem;
use DesignPattern\Behavioral\State\BudgetState;
use DesignPattern\Behavioral\State\InApprovalState;

class Budget implements BudgetableItem
{
    /** @var BudgetableItem */
    public array $items;
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

    public function addItem(BudgetableItem $item): void
    {
        $this->items[] = $item;
    }
    
    public function value(): float
    {
        return array_reduce(
            $this->items,
            fn(float $accumulatedValue, BudgetableItem $item) => $item->value() + $accumulatedValue,
            0
        );
    }
}