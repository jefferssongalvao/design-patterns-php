<?php
namespace DesignPattern\Creational\FactoryMethod\Log;

class FileLog implements LogWriter
{
    private $file;
    public function __construct(string $fileDirectory)
    {
        $this->file = fopen($fileDirectory, "a+");
    }
    public function writes(string $message): void
    {
        fwrite($this->file, $message);
    }

    public function __destruct()
    {
        fclose($this->file);
    }
}