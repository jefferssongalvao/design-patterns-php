<?php

namespace DesignPattern\Structural\Adapter\Http;

class ReactPhpHttpAdapter implements HttpAdapter
{
    public function post(string $url, array $data = []): void
    {
        echo "Registra em API via React PHP";
    }
}