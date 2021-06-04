<?php

use DesignPattern\Behavioral\ChainOfResponsibility\DiscountCalculator;
use DesignPattern\Behavioral\CommandHandler\GenerateOrderCommand;
use DesignPattern\Behavioral\CommandHandler\GenerateOrderHandler;
use DesignPattern\Behavioral\Observer\Actions\GenerateLogAction;
use DesignPattern\Behavioral\Observer\Actions\SendMailAction;
use DesignPattern\Behavioral\Observer\ActionSubject;
use DesignPattern\Behavioral\Strategy\TaxCalculator;
use DesignPattern\Behavioral\Strategy\Taxes\IcmsTax;
use DesignPattern\Behavioral\Strategy\Taxes\IssTax;
use DesignPattern\Behavioral\TemplateMethod\BrTax;
use DesignPattern\Budget;
use DesignPattern\Order;

require "../vendor/autoload.php";


$budget = new Budget();
$budget->value = 600;
$budget->items = 5;

$taxCalculator = new TaxCalculator();
$discountCalculator = new DiscountCalculator();

echo $taxCalculator->calculate($budget, new IcmsTax()) . PHP_EOL;
echo $taxCalculator->calculate($budget, new IssTax()) . PHP_EOL;
echo $taxCalculator->calculate($budget, new BrTax()) . PHP_EOL;
echo $discountCalculator->calculate($budget) . PHP_EOL;

$order = (new GenerateOrderHandler)->execute(
    new GenerateOrderCommand(10, 500, "Joseph Climber")
);

$actionSubject = new ActionSubject($order);
$actionSubject->addAction(new GenerateLogAction());
$actionSubject->addAction(new SendMailAction());
$actionSubject->notifyActions();
