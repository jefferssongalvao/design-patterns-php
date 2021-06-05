<?php

namespace DesignPattern\Behavioral\Observer\Actions;

use DesignPattern\Structural\Flyweight\Order;

class SendMailAction implements Action
{
    public function executeAction(Order $order): void
    {
        echo "Enviando e-mail";
    }
}