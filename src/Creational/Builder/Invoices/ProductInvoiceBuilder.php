<?php

namespace DesignPattern\Creational\Builder\Invoices;

use DesignPattern\Creational\Prototype\Invoice;

class ProductInvoiceBuilder extends InvoiceBuilder
{
    function build(): Invoice
    {
        $invoiceValue = $this->invoice->value();
        
        $this->invoice->taxValue = $invoiceValue * 0.02;

        return $this->invoice;
    }
}