<?php

namespace DesignPattern\Creational\FactoryMethod\Manager;

use DesignPattern\Creational\FactoryMethod\Log\LogWriter;

abstract class LogManager
{
    public function log(string $severity, string $message): void
    {
        /** @var LogWriter $logWriter */
        $logWriter = $this->createLogWriter();

        $data = date("Y-m-d");
        $formattedMessage = "[$data][$severity]: $message";
        $logWriter->writes($formattedMessage);

    }

    abstract function createLogWriter(): LogWriter;
}