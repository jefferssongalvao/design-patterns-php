<?php

namespace DesignPattern\Behavioral\Observer;

use DesignPattern\Behavioral\Observer\Actions\Action;
use DesignPattern\Order;

class ActionSubject
{
    private Order $order;
    /** @var Action[] */
    public array $actions;
    
    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    public function addAction(Action $action): void
    {
        $this->actions[] = $action;
    }

    public function notifyActions(): void
    {
        foreach($this->actions as $action) {
            $action->executeAction($this->order);
        }
    }
    
}