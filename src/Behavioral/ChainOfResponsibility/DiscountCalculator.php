<?php

namespace DesignPattern\Behavioral\ChainOfResponsibility;

use DesignPattern\Behavioral\ChainOfResponsibility\Discounts\DiscountPerItems;
use DesignPattern\Behavioral\ChainOfResponsibility\Discounts\DiscountPerValue;
use DesignPattern\Behavioral\ChainOfResponsibility\Discounts\NoDiscount;
use DesignPattern\Budget;

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