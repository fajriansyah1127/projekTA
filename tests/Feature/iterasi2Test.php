<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class iterasi2 extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    use WithFaker;
    use WithoutMiddleware;

    public function testLihatAsuransi()
    {
        $this->withoutExceptionHandling();
        $user = User::where('role','Admin')->first();
            $response = $this->actingAs($user)
                ->get(route('asuransi.index'));
            $response->assertStatus(200);
            
    }
    // public function test_the_application_returns_a_successful_response()
    // {
    //     $this->withoutExceptionHandling();
    //     $response = $this->get('/');

    //     $response->assertStatus(200);
    //  }
    // public function testCreateAsuransi()
    // {
    //     $user = User::where('role', 'Admin')->first();
    //         $response = $this->actingAs($user)
    //             ->post(route('asuransi.store'), [
    //                 'nama_asuransi' => $this->faker->company(),
    //                 'email_asuransi' => $this->faker->email(),
    //                 'kontak_asuransi' =>  $this->faker->phoneNumber(),
    //                 'alamat_asuransi' => $this->faker->address(),
    //                 'status_asuransi' => 'Berlaku',
    //             ]);
    //         $response->assertStatus(302);
    // }

    // public function testEditAsuransi()
    // {
    //     $user = User::where('role', 'Admin')->first();
    //     $response = $this->actingAs($user)
    //         ->put(route('asuransi.update', '1'), [
    //             'nama' => $this->faker->company() ,
    //             'email' => $this->faker->email(),
    //             'kontak' =>  $this->faker->phoneNumber(),
    //             'alamat' => $this->faker->address(),
    //             'status' => $this->faker->jobTitle(),
    //         ]);
    //     $response->assertStatus(302);
    // }

    // public function testHapusAsuransi()
    // {
    //     $user = User::where('role','Admin')->first();
    //     $response = $this->actingAs($user)->delete(route('asuransi.destroy',4));
    //     $response->assertStatus(302);
    // }

    // public function testLihatProduk()
    // {
    //     $user = User::where('role','Admin')->first();
    //         $response = $this->actingAs($user)
    //             ->get(route('produk.index'));
    //         $response->assertStatus(200)
    //         ->assertSee('produk');
    // }

    public function testCreateProduk()
    {
        $user = User::where('role', 'Admin')->first();
            $response = $this->actingAs($user)
                ->post(route('produk.store'), [
                    'nama_produk' => $this->faker->company() ,
                    'asuransi_produk' => '3',
                ]);
            $response->assertStatus(302);
    }

    // public function testEditProduk()
    // {
    //     $user = User::where('role', 'Admin')->first();
    //     $response = $this->actingAs($user)
    //         ->put(route('produk.update', 1), [ 
    //             'Nama' => $this->faker->company() ,
    //             'Asuransi' => '1',
    //         ]);

    //     $response->assertStatus(302);
    // }

    // public function testHapusProduk()
    // {
    //     $user = User::where('role','Admin')->first();
    //     $response = $this->actingAs($user)->delete(route('produk.destroy','12'));
    //     $response->assertStatus(302);
    // }

    // public function testLihatOutlet()
    // {
    //     $user = User::where('role','Admin')->first();
    //         $response = $this->actingAs($user)
    //             ->get(route('outlet.index'));
    //         $response->assertStatus(200);
    // }

    // public function testCreateOutlet()
    // {
    //     $user = User::where('role', 'Admin')->first();
    //         $response = $this->actingAs($user)
    //             ->post(route('outlet.store'), [
    //                 'nama_outlet' => $this->faker->company() ,
    //             ]);
    //         $response->assertStatus(302);
    // }

    // public function testEditOutlet()
    // {
    //     $user = User::where('role', 'Admin')->first();
    //     $response = $this->actingAs($user)
    //         ->put(route('outlet.update', 5), [ 
    //             'nama' => $this->faker->company() ,
    //         ]);

    //     $response->assertStatus(302);
    // }

    // public function testHapusOutlet()
    // {
    //     $user = User::where('role','Admin')->first();
    //     $response = $this->actingAs($user)->delete(route('outlet.destroy','4'));
    //     $response->assertStatus(302);
    // }

}
