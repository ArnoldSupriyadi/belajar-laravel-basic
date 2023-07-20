<?php

namespace Tests\Feature;

use GuzzleHttp\Psr7\Request;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SessionControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testCreateSession()
    {
        $this->get('session/create')
            ->assertSeeText('Ok')
            ->assertSessionHas("userId", "khannedy")
            ->assertSessionHas("isMember", true);
    }

    public function testGetSession()
    {
        $this->withSession([
            "UserId" => "khannedy",
            "isMember" => "true"
        ])->get('session/get')
            ->assertSeeText("User Id: khannedy, is Member :true");
    }

    public function testGetSessionFailed()
    {
        $this->withSession([])->get('session/get')
            ->assertSeeText("User Id: khannedy, is Member :true");
    }
}
