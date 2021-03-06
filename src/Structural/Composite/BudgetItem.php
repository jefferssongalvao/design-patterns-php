<?php

namespace DesignPattern\Structural\Composite;

use DesignPattern\Structural\Composite\BudgetableItem;

class BudgetItem implements BudgetableItem
{
    public float $value;
    public function value(): float
    {
        sleep(1);
        return $this->value;
    }
}
