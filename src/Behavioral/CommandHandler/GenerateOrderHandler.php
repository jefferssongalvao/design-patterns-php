<?php

namespace DesignPattern\Behavioral\CommandHandler;
use DesignPattern\Structural\Composite\Budget;
use DesignPattern\Structural\Flyweight\Order;
use DesignPattern\Structural\Flyweight\TemplateOrder;

class GenerateOrderHandler
{
    public function execute(GenerateOrderCommand $generateOrderCommand): Order
    {
        $budget = new Budget();
        $budget->value = $generateOrderCommand->getBudgetValue();

        $order = new Order();
        $order->budget = $budget;
        $order->templateOrder = new TemplateOrder($generateOrderCommand->getNameClient());

        return $order;
    }
}
