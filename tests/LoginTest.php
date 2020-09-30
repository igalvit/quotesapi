<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;

class LoginTest extends TestCase
{

    /**
     * TODO: Review this test
     */
    public function testLogin()
    {
        $this->user = User::first();
        $response = $this->json('POST', 'api/v1/login',
            [
                'email' => $this->user->email,
                'password' => $this->user->name
            ]);
        $this->assertEquals(200, $this->response->status());
    }

    public function testMe()
    {
        $user = User::factory()->make();
        $response = $this->actingAs($user)->json('GET', 'api/v1/me')
        ->seeJsonStructure([
            'name', 'email', 'email_verified_at', 'created_at', 'updated_at'
        ])->assertEquals(200, $this->response->status());
    }

    public function testLogout()
    {
        $user = User::factory()->make();
        $token = \Tymon\JWTAuth\Facades\JWTAuth::fromUser($user);
        $response = $this->actingAs($user)->json('POST', 'api/v1/logout?token=' . $token)
            ->seeJsonEquals([
                'message' => 'Successfully logged out'
            ])
            ->assertEquals(200, $this->response->status());
    }

    public function testRefresh()
    {
        $user = User::factory()->make();
        $token = \Tymon\JWTAuth\Facades\JWTAuth::fromUser($user);
        $response = $this->actingAs($user)->json('POST', 'api/v1/refresh?token=' . $token)
        ->seeJsonStructure([
            'access_token', 'token_type', 'expires_in'
        ])->assertEquals(200, $this->response->status());
    }
}
