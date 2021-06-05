<?php
namespace DesignPattern\Creational\FactoryMethod;

use DesignPattern\Creational\FactoryMethod\Manager\LogManager;

class LogGenerator
{
    private LogManager $logManager;
    private string $severity;
    private string $message;
    public function __construct(LogManager $logManager, string $severity, string $message)
    {
        $this->logManager = $logManager;
        $this->severity = $severity;
        $this->message = $message;
    }

    public function generateLog(): void
    {
        $this->logManager->log($this->severity, $this->message);
    }
}