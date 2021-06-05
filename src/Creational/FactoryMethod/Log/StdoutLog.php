<?php
namespace DesignPattern\Creational\FactoryMethod\Log;

class StdoutLog implements LogWriter
{
    public function writes(string $message): void
    {
        echo $message;
    }
}