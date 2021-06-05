<?php

namespace DesignPattern\Behavioral\ChainOfResponsibility\Discounts;

use DesignPattern\Structural\Composite\Budget;

abstract class Discount
{
    protected ?Discount $nextDiscount;

    public function __construct(?Discount $discount)
    {
        $this->nextDiscount = $discount;
    }

    abstract public function calculateDiscount(Budget $budget): float;    
}