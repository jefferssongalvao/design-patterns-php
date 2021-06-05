<?php

namespace DesignPattern\Behavioral\Observer\Actions;

use DesignPattern\Structural\Flyweight\Order;

interface Action
{
    public function executeAction(Order $order): void;
}