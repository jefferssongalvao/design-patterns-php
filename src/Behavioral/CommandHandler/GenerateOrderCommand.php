<?php

namespace DesignPattern\Behavioral\CommandHandler;

class GenerateOrderCommand
{
    private $numberItems;
    private $budgetValue;
    private $nameClient;
    
    public function __construct(int $numberItems, float $budgetValue, string $nameClient)
    {
        $this->numberItems = $numberItems;
        $this->budgetValue = $budgetValue;
        $this->nameClient = $nameClient;
    }
    
    public function getNumberItems(): int
    {
        return $this->numberItems;
    }
    
    public function getBudgetValue(): float
    {
        return $this->budgetValue;
    }
    
    public function getNameClient(): string
    {
        return $this->nameClient;
    }
}
