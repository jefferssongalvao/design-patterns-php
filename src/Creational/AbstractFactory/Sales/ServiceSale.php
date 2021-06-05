<?php

namespace DesignPattern\Creational\AbstractFactory\Sales;

use DateTimeImmutable;

class ServiceSale extends Sale
{
    private string $serviceFurnisher;
    public function __construct(DateTimeImmutable $saleDate, string $serviceFurnisher)
    {
        parent::__construct($saleDate);
        $this->serviceFurnisher = $serviceFurnisher;
    }
}
