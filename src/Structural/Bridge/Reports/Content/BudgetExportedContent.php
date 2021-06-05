<?php

namespace DesignPattern\Structural\Bridge\Reports\Content;

use DesignPattern\Structural\Composite\Budget;

class BudgetExportedContent implements ExportedContent
{

    private Budget $budget;
    public function __construct(Budget $budget)
    {
        $this->budget = $budget;
    }

    public function content(): array
    {
        return [
            "value" => $this->budget->value,
            "items" => $this->budget->items
        ];
    }
}