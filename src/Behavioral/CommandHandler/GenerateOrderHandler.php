<?php

namespace DesignPattern\Behavioral\CommandHandler;
use DesignPattern\Structural\Composite\Budget;
use DesignPattern\Structural\Flyweight\ExtrinsicData;
use DesignPattern\Structural\Flyweight\Order;

class GenerateOrderHandler
{
    public function execute(GenerateOrderCommand $generateOrderCommand): Order
    {
        $budget = new Budget();
        $budget->value = $generateOrderCommand->getBudgetValue();

        $order = new Order();
        $order->budget = $budget;
        $order->extrinsicData = new ExtrinsicData($generateOrderCommand->getNameClient());

        return $order;
    }
}
