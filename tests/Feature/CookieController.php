<?php

namespace Tests\Feature;

use GuzzleHttp\Psr7\Request;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\JsonResponse;
use Tests\TestCase;

class CookieController extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/cookie/set')
            ->assertSeeText("Hello Cookie")
            ->assetCookie("User-Id", "khannedy")
            ->assertCookie("Is-Member", "true");
        $response->assertStatus(200);
    }

    public function testCookie()
    {
        $this->withCookie('User-Id', "khannedy")
             ->withCookie("Is-Member", "true")
             ->get('/cookie/get')
             ->assertJson([
                "userId" => "Khannedy",
                "isMember" => "true"
             ]);
    }

}
