<?php

namespace DesignPattern\Structural\Flyweight;

use DesignPattern\Structural\Composite\Budget;

class OrderMaker
{
    /** @var TemplateOrder */
    private array $templates;
    public function __construct()
    {
        $this->templates = [];
    }

    public function createOrder(
        string $name,
        Budget $budget
    ): Order
    {
        $template = $this->generateTemplate($name, $budget);

        $order = new Order();
        $order->templateOrder = $template;
        $order->budget = $budget;

        return $order;
    }

    private function generateTemplate(
        string $name,
        Budget $budget
    ): TemplateOrder
    {
        $hash = md5($name . date("Y-m-d"));
        if(!array_key_exists($hash, $this->templates)) {
            $this->templates[$hash] = new TemplateOrder($name, $budget);
        }
        return $this->templates[$hash];
    }
}