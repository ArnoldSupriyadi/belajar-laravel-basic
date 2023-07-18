<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class URLGenerationTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testULRCurrent()
    {
        $this->get('/url/current?name=Eko')
            ->assertSeeText("url/current?name=Eko");
    }

    public function testNamed()
    {
        $this->get('/redirect/named')
            ->assertSeeText("/redirect/name/Eko");
    }

    public function testAction()
    {
        $this->get('url/action')
    }
}
