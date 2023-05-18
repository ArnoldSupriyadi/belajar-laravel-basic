<?php

namespace App\Services;

class HelloService implements HelloService
{
    public function hello(string $name):string
    {
        return "hallo $name";
    }
}