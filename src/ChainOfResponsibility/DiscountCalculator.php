<?php

namespace DesignPattern\ChainOfResponsibility;

use DesignPattern\Budget;
use DesignPattern\ChainOfResponsibility\Discounts\DiscountPerItems;
use DesignPattern\ChainOfResponsibility\Discounts\DiscountPerValue;
use DesignPattern\ChainOfResponsibility\Discounts\NoDiscount;

class DiscountCalculator
{
    public function calculate(Budget $budget): float
    {
        $discountChain = new DiscountPerItems(
            new DiscountPerValue(
                new NoDiscount()
            )
        );
        return $discountChain->calculateDiscount($budget);
    }
}