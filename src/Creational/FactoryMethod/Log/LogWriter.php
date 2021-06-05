<?php

namespace DesignPattern\Creational\FactoryMethod\Log;

interface LogWriter
{
    public function writes(string $message): void;
}