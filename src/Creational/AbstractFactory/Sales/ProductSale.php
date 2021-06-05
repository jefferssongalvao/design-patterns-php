<?php

namespace DesignPattern\Creational\AbstractFactory\Sales;

use DateTimeImmutable;

class ProductSale extends Sale
{
    private float $productWeight;
    public function __construct(DateTimeImmutable $saleDate, float $productWeight)
    {
        parent::__construct($saleDate);
        $this->productWeight = $productWeight;
    }
}
