<?php

namespace DesignPattern\Structural\Adapter;

use DesignPattern\Behavioral\State\FinishedState;
use DesignPattern\Budget;
use DesignPattern\Structural\Adapter\Http\HttpAdapter;
use DomainException;

class RegisterBudget
{
    private HttpAdapter $http;
    public function __construct(HttpAdapter $httpAdapter)
    {
        $this->http = $httpAdapter;
    }

    public function register(Budget $budget)
    {
        if(!$budget->actualState instanceof FinishedState) {
            throw new DomainException("Precisa estar finalizado");
        }
        $this->http->post(
            "http://api.registra.com",
            [
                'value' => $budget->value,
                'items' => $budget->items
            ]
        );
    }
}