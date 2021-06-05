<?php

namespace DesignPattern\Structural\Adapter\Http;

class CurlHttpAdapter implements HttpAdapter
{
    public function post(string $url, array $data = []): void
    {
        echo "Registra em API via CURL";
    }
}