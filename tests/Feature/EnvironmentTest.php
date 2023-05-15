<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class EnvironmentTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testGetEnv()
    {
        $youtube = env('YOUTUBE');

        self::assertEquals('Progammer Zaman Now', $youtube);
    }

    public function testDefaultEnv()
    {
        $author = env('AUTHOR', 'Eko');

        self::assertEquals('Eko', $author);
    }
}
