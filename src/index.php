<?php

use DesignPattern\Budget;
use DesignPattern\ChainOfResponsibility\DiscountCalculator;
use DesignPattern\Strategy\TaxCalculator;
use DesignPattern\Strategy\Taxes\IssTax;

require "../vendor/autoload.php";


$budget = new Budget();
$budget->value = 600;
$budget->items = 5;

$taxCalculator = new TaxCalculator();
$discountCalculator = new DiscountCalculator();

echo $taxCalculator->calculate($budget, new IssTax()) . PHP_EOL;
echo $discountCalculator->calculate($budget) . PHP_EOL;