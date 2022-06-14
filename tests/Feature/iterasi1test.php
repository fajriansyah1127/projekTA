<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Providers\RouteServiceProvider;
use App\Models\User;

class iterasi1 extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_the_application_returns_a_successful_response()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
    // public function test_users_can_authenticate_using_the_login_screen()
    // {
    //     // $user = User::factory()->create();

    //     $response = $this->post('/auth', [
    //         'email' => 'fajriansyah573@gmail.com',
    //         'password' => 'asdfghjkl',
    //     ]);

    //     $this->assertAuthenticated();
    //     $response->assertRedirect(RouteServiceProvider::HOME);
    // }
}
