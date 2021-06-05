<?php

namespace DesignPattern\Structural\Bridge\Reports\Content;

use DesignPattern\Structural\Flyweight\Order;

class OrderExportedContent implements ExportedContent
{

    private Order $order;
    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    public function content(): array
    {
        return [
            "date" => $this->order->date,
            "name_client" => $this->order->nameClient
        ];
    }
}