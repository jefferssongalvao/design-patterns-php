<?php

namespace DesignPattern\Creational\Singleton;

use PDO;

class PdoConnection extends PDO
{
    private static ?self $instance = null;
    private function __construct($dsn, $username = null, $passwd = null, $options = null)
    {
        parent::__construct($dsn, $username = null, $passwd = null, $options = null);
    }

    public static function getInstance($dsn, $username = null, $passwd = null, $options = null): self
    {
        if(self::$instance === null) {
            self::$instance = new static($dsn, $username = null, $passwd = null, $options = null);
        }
        return self::$instance;
    }
}