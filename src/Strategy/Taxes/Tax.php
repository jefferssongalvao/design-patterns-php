<?php

namespace DesignPattern\Strategy\Taxes;

use DesignPattern\Strategy\Budget;

interface Tax
{
    public function taxCalculation(Budget $budget): float;
}