<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use App\Models\Dokumen;
use App\Models\Peminjam;
use App\Models\User;
use Illuminate\Http\UploadedFile;

class iterasi3 extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    use WithFaker;
    use WithoutMiddleware;

    public function testLihatDokumen()
    {
        $user = User::where('role','Admin')->first();
            $response = $this->actingAs($user)
                ->get(route('dokumen.index'));

            $response->assertStatus(200)
            ->assertSee('Dokumen');
    }
    
    public function testCreateDokumen()
    {
        $user = User::where('role', 'Admin')->first();
            $response = $this->actingAs($user)
                ->post(route('dokumen.store'), [
                    'Nama' => $this->faker->name(),
                    'Nomor' => $this->faker->ean13(),
                    'Tanggal' =>  $this->faker->date(),
                    'Produk' => '4',
                    'File' => UploadedFile::fake()->create('test4.pdf', 1024),
                ]);
            $response->assertStatus(302);
    }

    public function testEditDokumen()
    {
        $user = User::where('role', 'Admin')->first();
        $response = $this->actingAs($user)
            ->put(route('dokumen.update', '12'), [
                'nama' => $this->faker->name(),
                'nomor' => $this->faker->ean13(),
                'tanggal_klaim' =>  $this->faker->date(),
                'produk_id' => '4', //aslinya 1
                'file' => UploadedFile::fake()->create('test11.pdf', 1024),
            ]);
        $response->assertStatus(302);
    }

    public function testHapusDokumen()
    {
        $user = User::where('role','Admin')->first();
        $response = $this->actingAs($user)->delete(route('dokumen.destroy',16));
        $response->assertStatus(302);
    }

    public function testLihatDataPeminjam()
    {
        $user = User::where('role','Admin')->first();
            $response = $this->actingAs($user)
                ->get(route('peminjam.index'));
            $response->assertStatus(200)
            ->assertSee('Data Peminjam');
    }

    public function testCreateDataPeminjam()
    {
        $user = User::where('role', 'Admin')->first();
            $response = $this->actingAs($user)
                ->post(route('peminjam.store'), [
                    'Nama' => $this->faker->name() ,
                    'Nomor_akad' => '1',
                    'Tanggal_pinjam' => '2022-08-19',
                ]);
            $response->assertStatus(302);
    }

    public function testEditDataPeminjam()
    {
        $user = User::where('role', 'Admin')->first();
        $response = $this->actingAs($user)
            ->put(route('peminjam.update', '5'), [ 
                'nama' => $this->faker->company() ,
                'dokumen_id' => '19',
                'tanggal' => '2022-08-27',
            ]);

        $response->assertStatus(302);
    }

    public function testHapusDataPeminjam()
    {
        $user = User::where('role','Admin')->first();
        $response = $this->actingAs($user)->delete(route('peminjam.destroy','9'));
        $response->assertStatus(302);
    }
}
