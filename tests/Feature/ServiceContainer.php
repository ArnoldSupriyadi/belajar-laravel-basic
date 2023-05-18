<?php

namespace Tests\Feature;

use App\Data\Person;
use App\Services\HelloService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ServiceContainer extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testDependencyInjection()
    {
        $foo1 = $this->app->make(Foo::class);
        $foo2 = $this->app->make(Foo::class);

        self::assertEquals('Foo', $foo1->foo());
        self::assertEquals('Foo', $foo2->foo());
        self::assertNotSame($foo1, $foo2);
    }

    public function testBind()
    {
        // $person = $this->app->make(Person::class);
        // self::assertNotNull($person);

        $this->app->bind(Person::class, function ($app){
            return new Person("arnold", "supriyadi");
        });

        $person1 = $this->app->make(Person::class);
        $person2 = $this->app->make(Person::class);

        self::assertEquals('Arnold', $person1->firstName());
        self::assertEquals('Arnold', $person2->firstName());
        self::assertNotSame($person1, $person2);
    }

     public function testSingleton()
    {

        $this->app->singleton(Person::class, function ($app){
            return new Person("arnold", "supriyadi");
        });

        $person1 = $this->app->make(Person::class);
        $person2 = $this->app->make(Person::class);

        self::assertEquals('Arnold', $person1->firstName());
        self::assertEquals('Arnold', $person2->firstName());
        self::assertSame($person1, $person2);
    }

      public function testInstance()
    {

        $person = new Person("arnold", "supriyadi");
        $this->app->instance(Person::class, $person);

        $person1 = $this->app->make(Person::class);
        $person2 = $this->app->make(Person::class);

        self::assertEquals('Arnold', $person1->firstName());
        self::assertEquals('Arnold', $person2->firstName());
        self::assertSame($person1, $person2);
    }

    public function testInterfaceToClass()
    {
        $helloService = $this->app->make(HelloService::class);
    }
}
