<?php

namespace DesignPattern\Behavioral\Observer\Actions;

use DesignPattern\Order;

interface Action
{
    public function executeAction(Order $order): void;
}