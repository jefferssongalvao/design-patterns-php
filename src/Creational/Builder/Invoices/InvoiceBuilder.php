<?php

namespace DesignPattern\Creational\Builder\Invoices;

use DateTimeImmutable;
use DateTimeInterface;
use DesignPattern\Creational\Prototype\Invoice;
use DesignPattern\Structural\Composite\BudgetItem;

abstract class InvoiceBuilder
{
    protected Invoice $invoice;
    
    public function __construct()
    {
        $this->invoice =  new Invoice();
        $this->invoice->issueDate = New DateTimeImmutable();
    }

    public function toCompany(string $cpnj, string $nameCompany): InvoiceBuilder
    {
        $this->invoice->cnpjCompany = $cpnj;
        $this->invoice->nameCompany = $nameCompany;

        return $this;
    }

    public function withItem(BudgetItem $item): InvoiceBuilder
    {
        $this->invoice->items[] = $item;

        return $this;
    }

    public function withComments(string $comments): InvoiceBuilder
    {
        $this->invoice->comments = $comments;

        return $this;
    }

    public function withIssueDate(DateTimeInterface $date): InvoiceBuilder
    {
        $this->invoice->issueDate = $date;

        return $this;
    }

    abstract function build(): Invoice;
}