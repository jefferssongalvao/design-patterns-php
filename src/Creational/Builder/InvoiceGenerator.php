<?php

namespace DesignPattern\Creational\Builder;

use DesignPattern\Creational\Builder\Invoices\Invoice;
use DesignPattern\Creational\Builder\Invoices\InvoiceBuilder;
use DesignPattern\Structural\Composite\BudgetItem;

class InvoiceGenerator
{
    private InvoiceBuilder $invoiceBuilder;
    public function __construct(InvoiceBuilder $invoiceBuilder)
    {
        $this->invoiceBuilder = $invoiceBuilder;
    }

    public function generateInvoice(): Invoice
    {
        $item1 = new BudgetItem();
        $item1->value = 500;

        $item2 = new BudgetItem();
        $item2->value = 6500;

        $item3 = new BudgetItem();
        $item3->value = 700;
        
        return $this->invoiceBuilder->toCompany("123456789", "Twitter")
            ->withItem($item1)
            ->withItem($item2)
            ->withItem($item3)
            ->withComments("Nota Fiscal Eletrônica")
            ->build();
    }
}