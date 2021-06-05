<?php

use DesignPattern\Behavioral\ChainOfResponsibility\DiscountCalculator;
use DesignPattern\Behavioral\ChainOfResponsibility\Discounts\NoDiscount;
use DesignPattern\Behavioral\CommandHandler\GenerateOrderCommand;
use DesignPattern\Behavioral\CommandHandler\GenerateOrderHandler;
use DesignPattern\Behavioral\Iterator\BudgetList;
use DesignPattern\Behavioral\Observer\Actions\GenerateLogAction;
use DesignPattern\Behavioral\Observer\Actions\SendMailAction;
use DesignPattern\Behavioral\Observer\ActionSubject;
use DesignPattern\Behavioral\Strategy\TaxCalculator;
use DesignPattern\Behavioral\Strategy\Taxes\IcmsTax;
use DesignPattern\Behavioral\Strategy\Taxes\IssTax;
use DesignPattern\Behavioral\TemplateMethod\BrTax;
use DesignPattern\Structural\Adapter\Http\CurlHttpAdapter;
use DesignPattern\Structural\Adapter\Http\ReactPhpHttpAdapter;
use DesignPattern\Structural\Adapter\RegisterBudget;
use DesignPattern\Structural\Bridge\Report;
use DesignPattern\Structural\Bridge\Reports\Content\BudgetExportedContent;
use DesignPattern\Structural\Bridge\Reports\FileType\XmlFileExported;
use DesignPattern\Structural\Composite\Budget;
use DesignPattern\Structural\Composite\BudgetableItem;
use DesignPattern\Structural\Composite\BudgetItem;
use DesignPattern\Structural\Facade\DiscountProcess;

require "../vendor/autoload.php";

$budget = new Budget();
$budget->value = 600;

$taxCalculator = new TaxCalculator();
$discountCalculator = new DiscountCalculator();

echo $taxCalculator->calculate($budget, new IcmsTax()) . PHP_EOL;
echo $taxCalculator->calculate($budget, new IssTax()) . PHP_EOL;
echo $taxCalculator->calculate($budget, new IcmsTax(new IssTax())) . PHP_EOL;
echo $taxCalculator->calculate($budget, new BrTax()) . PHP_EOL;
echo $discountCalculator->calculate($budget) . PHP_EOL;

echo "<br />";

$order = (new GenerateOrderHandler)->execute(
    new GenerateOrderCommand(10, 500, "Joseph Climber")
);

$actionSubject = new ActionSubject($order);
$actionSubject->addAction(new GenerateLogAction());
$actionSubject->addAction(new SendMailAction());
$actionSubject->notifyActions();

$budgetList = new BudgetList();
$budgetList->addBudget($budget);

foreach ($budgetList as $budgetItem) {
    echo "Valor:" . $budgetItem->value . PHP_EOL;
}

echo "<br />";

$budget->finish();

$registerBudget = new RegisterBudget(new CurlHttpAdapter());
$registerBudget->register($budget);

$registerBudget = new RegisterBudget(new ReactPhpHttpAdapter());
$registerBudget->register($budget);

$report = new Report(new XmlFileExported("budget"), new BudgetExportedContent($budget));
echo $report->export();

echo "<br />";

$budget = new Budget();

$item1 = new BudgetItem();
$item1->value = 100;
$budget->addItem($item1);

$item2 = new BudgetItem();
$item2->value = 350;
$budget->addItem($item2);

$oldBudget = new Budget();
$item3 = new BudgetItem();
$item3->value = 450;
$oldBudget->addItem($item3);
$budget->addItem($oldBudget);

echo $budget->value();

echo "<br />";

(new DiscountProcess($budget))->process(new NoDiscount());