<?php

namespace DesignPattern\Behavioral\Strategy\Taxes;

use DesignPattern\Budget;

interface Tax
{
    public function taxCalculation(Budget $budget): float;
}