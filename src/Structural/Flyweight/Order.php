<?php

namespace DesignPattern\Structural\Flyweight;

use DesignPattern\Structural\Composite\Budget;

class Order
{
    public Budget $budget;
    public ExtrinsicData $extrinsicData;
}
