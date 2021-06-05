<?php

namespace DesignPattern\Creational\AbstractFactory\Sales;

use DateTimeImmutable;

abstract class Sale
{
    protected DateTimeImmutable $saleDate;

    public function __construct(DateTimeImmutable $saleDate)
    {
        $this->saleDate = $saleDate;
    }
}