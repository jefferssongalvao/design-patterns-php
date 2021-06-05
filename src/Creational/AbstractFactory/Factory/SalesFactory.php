<?php

namespace DesignPattern\Creational\AbstractFactory\Factory;

use DesignPattern\Creational\AbstractFactory\Sales\Sale;
use DesignPattern\Structural\Decorator\Tax;

interface SalesFactory
{
    public function createSale(): Sale;
    public function tax(): Tax;
}