<?php
namespace DesignPattern\Creational\FactoryMethod\Manager;

use DesignPattern\Creational\FactoryMethod\Log\LogWriter;
use DesignPattern\Creational\FactoryMethod\Log\StdoutLog;

class StdoutLogManager extends LogManager
{
    public function createLogWriter(): LogWriter
    {
        return new StdoutLog();
    }
}