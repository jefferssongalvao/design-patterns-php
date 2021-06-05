<?php

namespace DesignPattern\Creational\AbstractFactory;

use DesignPattern\Creational\AbstractFactory\Factory\SalesFactory;

class SaleGenerator
{
    private SalesFactory $salesFactory;
    public function __construct(SalesFactory $salesFactory)
    {
        $this->salesFactory = $salesFactory;
    }

    public function generateSale(): void
    {
        $this->salesFactory->createSale();
        $this->salesFactory->tax();

        var_dump($this->salesFactory);
    }
}