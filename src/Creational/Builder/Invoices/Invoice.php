<?php

namespace DesignPattern\Creational\Builder\Invoices;

use DateTimeInterface;
use DesignPattern\Structural\Composite\BudgetItem;

class Invoice
{
    public string $cnpjCompany;
    public string $nameCompany;
    /** @var BudgetItem[] */
    public array $items;
    public string $comments;
    public DateTimeInterface $issueDate;
    public float $taxValue;

    public function value(): float{
        return array_reduce(
            $this->items,
            fn(float $total, BudgetItem $item) => $total + $item->value(),
            0
        );
    }
}