<?php

namespace DesignPattern\Behavioral\CommandHandler;

use DesignPattern\Budget;

class GenerateOrderHandler
{
    public function execute(GenerateOrderCommand $generateOrderCommand): void
    {
        $budget = new Budget();
        $budget->items = $generateOrderCommand->getNumberItems();
        $budget->value = $generateOrderCommand->getBudgetValue();

        $order = new Order();
        $order->budget = $budget;
        $order->nameClient = $generateOrderCommand->getNameClient();

        echo "Gerar pedido no banco de dados" . PHP_EOL;
        echo "Enviar pedido por e-mail" . PHP_EOL;
    }
}
