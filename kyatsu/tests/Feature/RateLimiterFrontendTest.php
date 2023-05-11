<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Http\Request;

class RateLimiterFrontendTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = "";
        for ($i = 0; $i <= 5; $i++) {
            $response = $this->get('/api/frontend/user/a/1', [
                "X-Requested-With:" => "XMLHttpRequest",
                "Accept" => "application/json; charset=utf8",
                "Follow" => "false"
            ]);
            if ($response->getStatusCode() == 429) {
                break;
            }
        }
        $response->assertStatus(429);
    }
}
