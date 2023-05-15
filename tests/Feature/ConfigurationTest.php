<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use function PHPUnit\Framework\assertEquals;

class ConfigurationTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testConfig()
    {
        $firstName = config('contoh.name.first');
        $lastName = config('contoh.author.last');
        $email = config('contoh.email');
        $web = config('contoh.web');


        self::assertEquals('Arnold', $firstName);
        self::assertEquals('Supriyadi', $lastName);
        self::assertEquals('arnold@gmail.com', $email);
        self::assertEquals('arnoldsupriyadi.coms', $web);
    }
}
