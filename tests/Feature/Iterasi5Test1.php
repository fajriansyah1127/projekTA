<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use App\Models\User;
use Illuminate\Http\UploadedFile;

class Iterasi5Test extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    // use WithoutMiddleware;
    public function testMelihatKontak()
    {
        $user = User::where('role','Admin')->first();
        $response = $this->actingAs($user)
        ->get(route('kontak'));
        
        $response->assertSuccessful()
        ->assertSee('Contact');
    }

    public function testMelihatRiwayat()
    {
        $user = User::where('role','Admin')->first();
        $response = $this->actingAs($user)
        ->get(route('riwayat.index'));
        
        $response->assertSuccessful()
        ->assertSee('riwayat');
        // ->assertSee('Biodata');
    }

    public function testMelihatFormulirBarang()
    {
        $user = User::where('role','Admin')->first();
                $response = $this->actingAs($user)
                    ->get(route('formulir'));
                $response->assertStatus(200);
    }

    public function testMenambahFormulirBarang()
    {
        $user = User::where('role','Admin')->first();
                $response = $this->actingAs($user)
                    ->get(route('formulir'));
                $response->assertStatus(200);
    }

    public function testMengubahFormulirBarang()
    {
        $user = User::where('role','Admin')->first();
                $response = $this->actingAs($user)
                    ->get(route('formulir'));
                $response->assertStatus(200);
    }

    public function testMenghapusFormulirBarang()
    {
        $user = User::where('role','Admin')->first();
                $response = $this->actingAs($user)
                    ->get(route('formulir'));
                $response->assertStatus(200);
    }

    public function testMengunduhFormulirBarang()
    {
        $user = User::where('role','Admin')->first();
                $response = $this->actingAs($user)
                    ->get(route('formulir'));
                $response->assertStatus(200);
    }

    public function testLogout()
    {
        $user = User::where('role','Admin')->first();
        $this->actingAs($user);;
        $response = $this->post(route('logout'));
        $response->assertRedirect('/');
    }
}
