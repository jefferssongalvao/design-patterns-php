<?php

namespace DesignPattern\Structural\Flyweight;

class ExtrinsicData
{
    private string $nameClient;

    public function __construct(string $name)
    {
        $this->nameClient = $name;
    }
    
    public function getNameClient(): string
    {
        return $this->nameClient;
    }
}