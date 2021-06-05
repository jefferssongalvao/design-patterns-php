<?php

namespace DesignPattern\Structural\Adapter\Http;

interface HttpAdapter
{
    public function post(string $url, array $data = []): void;
}