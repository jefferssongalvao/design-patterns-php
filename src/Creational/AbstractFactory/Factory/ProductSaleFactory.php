<?php

namespace DesignPattern\Creational\AbstractFactory\Factory;

use DateTimeImmutable;
use DesignPattern\Behavioral\Strategy\Taxes\IcmsTax;
use DesignPattern\Creational\AbstractFactory\Sales\ProductSale;
use DesignPattern\Creational\AbstractFactory\Sales\Sale;
use DesignPattern\Structural\Decorator\Tax;

class ProductSaleFactory implements SalesFactory
{

    private float $productWeight;
    public function __construct(float $productWeight)
    {
        $this->productWeight = $productWeight;
    }

    public function createSale(): Sale
    {
        return new ProductSale(new DateTimeImmutable(), $this->productWeight);
    }

    public function tax(): Tax
    {
        return new IcmsTax();
    }
}