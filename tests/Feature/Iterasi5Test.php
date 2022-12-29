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
    use WithFaker;
    use WithoutMiddleware;
    public function testMelihatKontak()
    {
        $user = User::where('role','Admin')->first();
        $response = $this->actingAs($user)
        ->get(route('kontak'));
        
        $response->assertStatus(200)
        ->assertSee('Contact');
    }

    public function testMelihatRiwayat()
    {
        $user = User::where('role','Admin')->first();
        $response = $this->actingAs($user)
        ->get(route('riwayat.index'));
        
        $response->assertStatus(200)
        ->assertSee('riwayat');
        // ->assertSee('Biodata');
    }
  
    public function testMelihatFormulirBarang()
    {
        $user = User::where('role', 'Admin')->first();
        $response = $this->actingAs($user)
            ->get(route('formulirs.index'));
            $response->assertStatus(200)
        ->assertSee('Formulir');
    }

    public function testMenambahFormulirBarang()
    {
        $user = User::where('role', 'Admin')->first();
            $response = $this->actingAs($user)
                ->post(route('formulirs.store'), [
                    'nama_formulir' => $this->faker->name(),
                    'file_formulir' => UploadedFile::fake()->create('test4.pdf', 1024),
                ]);
            $response->assertStatus(302);
    }

    // public function testMengubahFormulirBarang()
    // {
    //     $user = User::where('role', 'Admin')->first();
    //     $response = $this->actingAs($user)
    //         ->put(route('formulirs.update', '3'), [
    //             'nama' => $this->faker->name(),
    //             'file_formulir' => UploadedFile::fake()->create('test4.pdf', 1024),
    //         ]);
    //     $response->assertStatus(302);
    // }

    public function testMenghapusFormulirBarang()
    {
        $user = User::where('role','Admin')->first();
                $response = $this->actingAs($user)
                    ->delete(route('formulirs.destroy', '2'));
                $response->assertStatus(302);
    }

    public function testMengunduhFormulirBarang()
    {
        $user = User::where('role','Admin')->first();
                $response = $this->actingAs($user)
                    ->get(route('formulirs.show','Serah Terima Barang_211222.pdf'));
                $response->assertDownload();
    }

    public function testLogout()
    {
        $user = User::where('role','Admin')->first();
        $this->actingAs($user);
        $this->assertAuthenticatedAs($user);
        $response = $this->post('/logout');
        $response->assertSee('Sign In');
    }
}
