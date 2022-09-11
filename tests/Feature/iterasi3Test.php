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

    // public function testLihatDokumen()
    // {
    //     $user = User::where('role','Admin')->first();
    //         $response = $this->actingAs($user)
    //             ->get(route('dokumen.index'));

    //         $response->assertStatus(200)
    //         ->assertSee('Dokumen');
    // }
    
    public function testCreateDokumen()
    {
        $user = User::where('role', 'Magang')->first();
            $response = $this->actingAs($user)
                ->post(route('dokumen.store'), [
                    'nama_dokumen' => $this->faker->name(),
                    'nomor_dokumen' => $this->faker->ean13(),
                    'outlet_dokumen' =>  $this->faker->numberBetween($min = 1, $max = 10),
                    'tanggal_dokumen' =>  $this->faker->date(),
                    'produk_dokumen' => $this->faker->numberBetween($min = 1, $max = 7),
                    'file_dokumen' => UploadedFile::fake()->create('test4.pdf', 1024),
                ]);
            $response->assertStatus(302);
    }

    // public function testEditDokumen()
    // {
    //     $user = User::where('role', 'Admin')->first();
    //     $response = $this->actingAs($user)
    //         ->put(route('dokumen.update', '52yr7zQvdp'), [
    //             'nama' => $this->faker->name(),
    //             'nomor_akad' => $this->faker->ean13(),
    //             'outlet_id' => '1',
    //             'tanggal_klaim' =>  $this->faker->date(),
    //             'produk_id' => '18', //aslinya 1
    //             //'file' => UploadedFile::fake()->create('test11.pdf', 1024),
    //         ]);
    //     $response->assertStatus(302);
    // }

    // public function testHapusDokumen()
    // {
    //     $user = User::where('role','Admin')->first();
    //     $response = $this->actingAs($user)->delete(route('dokumen.destroy','4j7rq4QzOl'));
    //     $response->assertStatus(302);
    // }

    // public function testLihatDataPeminjam()
    // {
    //     $user = User::where('role','Admin')->first();
    //         $response = $this->actingAs($user)
    //             ->get(route('peminjam.index'));
    //         $response->assertStatus(200)
    //         ->assertSee('Data Peminjam');
    // }

    // public function testCreateDataPeminjam()
    // {
    //     $user = User::where('role', 'Admin')->first();
    //         $response = $this->actingAs($user)
    //             ->post(route('peminjam.store'), [
    //                 'Nama' => $this->faker->name() ,
    //                 'Nomor_akad' => '1',
    //                 'Tanggal_pinjam' => '2022-08-19',
    //             ]);
    //         $response->assertStatus(302);
    // }

    // public function testEditDataPeminjam()
    // {
    //     $user = User::where('role', 'Admin')->first();
    //     $response = $this->actingAs($user)
    //         ->put(route('peminjam.update', '3'), [ 
    //             'nama' => $this->faker->company() ,
    //             'dokumen_id' => '1',
    //             'tanggal' => '2022-08-27',
    //         ]);

    //     $response->assertStatus(302);
    // }

    // public function testHapusDataPeminjam()
    // {
    //     $user = User::where('role','Admin')->first();
    //     $response = $this->actingAs($user)->delete(route('peminjam.destroy','5'));
    //     $response->assertStatus(302);
    // }
}
