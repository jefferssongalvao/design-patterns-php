<?php

use DesignPattern\Strategy\Budget;
use DesignPattern\Strategy\TaxCalculator;
use DesignPattern\Strategy\Taxes\IcmsTax;
use DesignPattern\Strategy\Taxes\IssTax;

require "../../vendor/autoload.php";

$calculator = new TaxCalculator();

$budget = new Budget();
$budget->value = 100;

echo $calculator->calculate($budget, new IssTax());