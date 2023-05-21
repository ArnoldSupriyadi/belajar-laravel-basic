<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use League\Flysystem\Config;
use Tests\TestCase;

use function PHPUnit\Framework\assertEquals;
use function Spatie\Ignition\ErrorPage\config;

class FacadeTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testConfig()
    {
        $firstName1 = config('contoh.author.first');
        $firstName2 = Config::get('contoh.author.first');

        self::assertEquals($firstName1, $firstName2);

        var_dump(Config::all());
    }

     public function testConfigDependecy()
    {
        $this = $this->app->make('config');
        $firstName3 = config('contoh.author.first');

        $firstName1 = config('contoh.author.first');
        $firstName2 = Config::get('contoh.author.first');

        self::assertEquals($firstName1, $firstName2);

        var_dump(Config::all());
    }

    public function testFacadeMock()
    {
        Config::shouldReceive('get')
            ->with('contoh.author.first')
            ->andReturn('Eko Keren');

            $firstName = Config::get('contoh.author.first');

            self::assertEquals('Eko Keren', $firstName);
    }
}
