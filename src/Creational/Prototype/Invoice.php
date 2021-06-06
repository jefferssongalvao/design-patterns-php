<?php

namespace DesignPattern\Creational\Prototype;

use DateTimeImmutable;
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

    public function __clone()
    {
        $this->issueDate = new DateTimeImmutable();
    }
}