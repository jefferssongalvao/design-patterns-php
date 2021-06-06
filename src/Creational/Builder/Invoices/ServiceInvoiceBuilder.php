<?php

namespace DesignPattern\Creational\Builder\Invoices;

use DesignPattern\Creational\Prototype\Invoice;

class ServiceInvoiceBuilder extends InvoiceBuilder
{
    function build(): Invoice
    {
        $invoiceValue = $this->invoice->value();
        
        $this->invoice->taxValue = $invoiceValue * 0.06;

        return $this->invoice;
    }
}