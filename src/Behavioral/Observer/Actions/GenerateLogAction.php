<?php

namespace DesignPattern\Behavioral\Observer\Actions;


use DesignPattern\Behavioral\Observer\Actions\Action;
use DesignPattern\Structural\Flyweight\Order;

class GenerateLogAction implements Action
{
    public function executeAction(Order $order): void
    {
        echo "Gerando log do pedido";
    }
}