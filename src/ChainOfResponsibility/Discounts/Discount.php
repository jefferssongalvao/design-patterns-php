<?php

namespace DesignPattern\ChainOfResponsibility\Discounts;

use DesignPattern\Budget;

abstract class Discount
{
    protected ?Discount $nextDiscount;

    public function __construct(?Discount $discount)
    {
        $this->nextDiscount = $discount;
    }

    abstract public function calculateDiscount(Budget $budget): float;
    
}