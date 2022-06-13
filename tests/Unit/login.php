<?php

namespace Tests\Unit;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class login extends TestCase
{
    
    public function route_login()
    {
        $this->get("/login")->assertTrue(true);
    }

    public function login()
    {
         // Kita memiliki 1 user terdaftar
        //  $user = factory(User::class)->create([
        //     'email'    => 'fajriansyah573@gmail.com',
        //     'password' => bcrypt('asdfghjkl'),
        // ]);

        // Kunjungi halaman '/login'
        $this->visit('/login');

        // Submit form login dengan email dan password yang tepat
        $this->submitForm('Login', [
            'email'    => 'fajriansyah573@gmail.com',
            'password' => 'asdfghjkl',
        ]);

        // Lihat halaman ter-redirect ke url '/home' (login sukses).
        $this->seePageIs('/home');

        // Kita melihat halaman tulisan "Dashboard" pada halaman itu.
        $this->seeText('Dashboard');
    }
}
