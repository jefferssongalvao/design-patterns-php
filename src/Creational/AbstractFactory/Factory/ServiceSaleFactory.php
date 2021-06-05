<?php

namespace DesignPattern\Creational\AbstractFactory\Factory;

use DateTimeImmutable;
use DesignPattern\Behavioral\Strategy\Taxes\IssTax;
use DesignPattern\Creational\AbstractFactory\Sales\Sale;
use DesignPattern\Creational\AbstractFactory\Sales\ServiceSale;
use DesignPattern\Structural\Decorator\Tax;

class ServiceSaleFactory implements SalesFactory
{

    private string $serviceFurnisher;
    public function __construct(string $serviceFurnisher)
    {
        $this->serviceFurnisher = $serviceFurnisher;
    }

    public function createSale(): Sale
    {
        return new ServiceSale(new DateTimeImmutable(), $this->serviceFurnisher);
    }

    public function tax(): Tax
    {
        return new IssTax();
    }
}