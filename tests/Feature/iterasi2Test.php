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
        $user = User::where('role','Admin')->first();
            $response = $this->actingAs($user)
                ->get(route('asuransi.index'));

            $response->assertStatus(200)
            ->assertSee('Data Unit Asuransi');
    }
    public function testCreateAsuransi()
    {
        $user = User::where('role', 'Admin')->first();
            $response = $this->actingAs($user)
                ->post(route('asuransi.store'), [
                    'Nama' => $this->faker->company(),
                    'Email' => $this->faker->email(),
                    'Kontak' =>  $this->faker->phoneNumber(),
                    'Alamat' => $this->faker->address(),
                    'Status' => 'Berlaku',
                ]);
            $response->assertStatus(302);
    }

    public function testEditAsuransi()
    {
        $user = User::where('role', 'Admin')->first();
        $response = $this->actingAs($user)
            ->put(route('asuransi.update', '11'), [
                'nama' => $this->faker->company() ,
                'email' => $this->faker->email(),
                'kontak' =>  $this->faker->phoneNumber(),
                'alamat' => $this->faker->address(),
                'status' => $this->faker->jobTitle(),
            ]);
        $response->assertStatus(302);
    }

    public function testHapusAsuransi()
    {
        $user = User::where('role','Admin')->first();
        $response = $this->actingAs($user)->delete(route('asuransi.destroy',14));
        $response->assertStatus(302);
    }

    public function testLihatProduk()
    {
        $user = User::where('role','Admin')->first();
            $response = $this->actingAs($user)
                ->get(route('produk.index'));
            $response->assertStatus(200)
            ->assertSee('produk');
    }

    public function testCreateProduk()
    {
        $user = User::where('role', 'Admin')->first();
            $response = $this->actingAs($user)
                ->post(route('produk.store'), [
                    'Nama' => $this->faker->company() ,
                    'Asuransi' => '4',
                ]);
            $response->assertStatus(302);
    }

    public function testEditProduk()
    {
        $user = User::where('role', 'Admin')->first();
        $response = $this->actingAs($user)
            ->put(route('produk.update', 19), [ 
                'Nama' => $this->faker->company() ,
                'Asuransi' => '4',
            ]);

        $response->assertStatus(302);
    }

    public function testHapusProduk()
    {
        $user = User::where('role','Admin')->first();
        $response = $this->actingAs($user)->delete(route('produk.destroy','21'));
        $response->assertStatus(302);
    }

}
