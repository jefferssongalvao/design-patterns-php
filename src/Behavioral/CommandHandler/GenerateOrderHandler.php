<?php

namespace DesignPattern\Behavioral\CommandHandler;

use DesignPattern\Budget;
use DesignPattern\Order;

class GenerateOrderHandler
{
    public function execute(GenerateOrderCommand $generateOrderCommand): Order
    {
        $budget = new Budget();
        $budget->items = $generateOrderCommand->getNumberItems();
        $budget->value = $generateOrderCommand->getBudgetValue();

        $order = new Order();
        $order->budget = $budget;
        $order->nameClient = $generateOrderCommand->getNameClient();

        return $order;
    }
}
