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
use DesignPattern\Creational\AbstractFactory\Factory\ProductSaleFactory;
use DesignPattern\Creational\AbstractFactory\Factory\ServiceSaleFactory;
use DesignPattern\Creational\AbstractFactory\SaleGenerator;
use DesignPattern\Creational\Builder\InvoiceGenerator;
use DesignPattern\Creational\Builder\Invoices\ServiceInvoiceBuilder;
use DesignPattern\Creational\FactoryMethod\LogGenerator;
use DesignPattern\Creational\FactoryMethod\Manager\StdoutLogManager;
use DesignPattern\Structural\Adapter\Http\CurlHttpAdapter;
use DesignPattern\Structural\Adapter\Http\ReactPhpHttpAdapter;
use DesignPattern\Structural\Adapter\RegisterBudget;
use DesignPattern\Structural\Bridge\Report;
use DesignPattern\Structural\Bridge\Reports\Content\BudgetExportedContent;
use DesignPattern\Structural\Bridge\Reports\FileType\XmlFileExported;
use DesignPattern\Structural\Composite\Budget;
use DesignPattern\Structural\Composite\BudgetItem;
use DesignPattern\Structural\Facade\DiscountProcess;
use DesignPattern\Structural\Flyweight\OrderMaker;
use DesignPattern\Structural\Proxy\BudgetCache;

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

echo "<br /><br />";

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

echo "<br /><br />";

$budget->finish();

$registerBudget = new RegisterBudget(new CurlHttpAdapter());
$registerBudget->register($budget);

$registerBudget = new RegisterBudget(new ReactPhpHttpAdapter());
$registerBudget->register($budget);

$report = new Report(new XmlFileExported("budget"), new BudgetExportedContent($budget));
echo $report->export();

echo "<br /><br />";

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

echo "<br /><br />";

(new DiscountProcess($budget))->process(new NoDiscount());

echo "<br /><br />";

$budgetCache = new BudgetCache($budget);
echo $budget->value();

echo "<br /><br />";

$orders = [];
$orderMaker = new OrderMaker();

for($i = 0; $i < 10000; $i++) {
    $order = $orderMaker->createOrder(
        "Jeffersson Galvão",
        new Budget()
    );
    $orders[] = $order;
}

echo memory_get_peak_usage();

echo "<br /><br />";

$logGenerator = new LogGenerator(
    new StdoutLogManager(),
    "info",
    "Testando o log"
);
$logGenerator->generateLog();

echo "<br /><br />";

$saleGenerator = new SaleGenerator(new ProductSaleFactory(1000));
$saleGenerator->generateSale();

$saleGenerator = new SaleGenerator(new ServiceSaleFactory("Jeffersson"));
$saleGenerator->generateSale();

echo "<br /><br />";

$invoiceGenerator = new InvoiceGenerator(new ServiceInvoiceBuilder());
$invoice = $invoiceGenerator->generateInvoice();
echo $invoice->value();

echo "<br /><br />";

$invoiceClone = clone $invoice;

echo "<pre>";
var_dump($invoice, $invoiceClone);
echo "</pre>";