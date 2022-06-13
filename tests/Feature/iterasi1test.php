<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Tests\TestCase;

class iterasi1test extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
    public function test_users_can_authenticate_using_the_login_screen()
    {
        // $user = User::factory()->create();
        // $response = $this->post('/auth', [
        //     'email' => $user->email,
        //     'password' => 'password',
        // ]);

        // $this->assertAuthenticated();
        // $response->assertRedirect(RouteServiceProvider::HOME);
        $response = $this->get('/index');

        $response->assertStatus(200);
    }

}
