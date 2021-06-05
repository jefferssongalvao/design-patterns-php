<?php

namespace DesignPattern\Behavioral\CommandHandler;

use DesignPattern\Order;
use DesignPattern\Structural\Composite\Budget;

class GenerateOrderHandler
{
    public function execute(GenerateOrderCommand $generateOrderCommand): Order
    {
        $budget = new Budget();
        $budget->value = $generateOrderCommand->getBudgetValue();

        $order = new Order();
        $order->budget = $budget;
        $order->nameClient = $generateOrderCommand->getNameClient();

        return $order;
    }
}
