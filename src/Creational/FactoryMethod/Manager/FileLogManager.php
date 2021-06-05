<?php
namespace DesignPattern\Creational\FactoryMethod\Manager;

use DesignPattern\Creational\FactoryMethod\Log\FileLog;
use DesignPattern\Creational\FactoryMethod\Log\LogWriter;

class FileLogManager extends LogManager
{
    private string $fileDirectory;
    public function __construct(string $fileDirectory)
    {
        $this->fileDirectory = $fileDirectory;
    }

    public function createLogWriter(): LogWriter
    {
        return new FileLog($this->fileDirectory);
    }
}