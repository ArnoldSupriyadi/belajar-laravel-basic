<?php

namespace Tests\Feature;

use App\Services\HelloService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use function PHPUnit\Framework\assertEquals;

class FooBarServiceProvider extends TestCase
{
    // public array $singletons = [
    //     HelloService::class => HelloServiceIndonesia::class
    // ];

    public function testServiceProvider()
    {
        $foo = $this->app->make(Foo::class);
        $foo2 = $this->app->make(Foo::class);

        assertEquals($foo, $foo2);

        $bar1 = $this->app->make(Bar::class);
        $bar2 = $this->app->make(Bar::class);

        Self::assertSame($bar1, $bar2);
    }

    public function testPropertySingletons()
    {
        $helloService1 = $this->app->make(HelloService::class);
        $helloservice2 = $this->app->make(HelloService::class);

        Self::assertSame($helloService1, $helloservice2);
    }
}
