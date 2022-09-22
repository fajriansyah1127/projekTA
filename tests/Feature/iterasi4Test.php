<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use App\Models\User;
use Illuminate\Http\UploadedFile;
use App\Models\Satuan;
use App\Models\BarangKeluar;
use App\Models\BarangMasuk;
use App\Models\Stok;
use App\Models\PeminjamBarang;
use Tests\TestCase;

class iterasi4Test extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    use WithFaker;
    use WithoutMiddleware;
    public function testLihatSatuan()
    {
        $user = User::where('role','Admin')->first();
            $response = $this->actingAs($user)
                ->get(route('satuan.index'));
            $response->assertStatus(200)
            ->assertSee('Satuan');
    }
    
    public function testCreateSatuan()
    {
        $user = User::where('role', 'Admin')->first();
            $response = $this->actingAs($user)
                ->post(route('satuan.store'), [
                    'nama_satuan' => $this->faker->word(),
                    'jenis_satuan' => $this->faker->word(),
                    'detail_satuan' => $this->faker->word(),
                ]);
            $response->assertStatus(302);
    }

    public function testEditSatuan()
    {
        $user = User::where('role', 'Admin')->first();
        $response = $this->actingAs($user)
            ->put(route('satuan.update', '6'), [
                'nama' => $this->faker->word(),
                'jenis' => $this->faker->word(),
                'detail' => $this->faker->word(),
            ]);
        $response->assertStatus(302);
    }

    public function testHapusSatuan()
    {
        $user = User::where('role','Admin')->first();
        $response = $this->actingAs($user)->delete(route('satuan.destroy','8'));
        $response->assertStatus(302);
    }

    public function testLihatStok()
    {
        $user = User::where('role','Admin')->first();
            $response = $this->actingAs($user)
                ->get(route('stok.index'));

            $response->assertStatus(200)
            ->assertSee('Stok');
    }
    
    public function testCreateStok()
    {
        $user = User::where('role', 'Admin')->first();
            $response = $this->actingAs($user)
                ->post(route('stok.store'), [
                    'nama_barang' => $this->faker->word(),
                    'jenis_barang' => $this->faker->word(),
                    'jumlah' => '0',
                    'satuan' => '1',
                ]);
            $response->assertStatus(302);
    }

    public function testEditStok()
    {
        $user = User::where('role', 'Admin')->first();
        $response = $this->actingAs($user)
            ->put(route('stok.update', '3'), [
                'nama_barang' => $this->faker->word(),
                'jenis_barang' => $this->faker->word(),
                'satuan_id' => '2',
            ]);
        $response->assertStatus(302);
    }

    public function testHapusStok()
    {
        $user = User::where('role','Admin')->first();
        $response = $this->actingAs($user)->delete(route('stok.destroy','5'));
        $response->assertStatus(302);
    }

    public function testLihatBarangMasuk()
    {
        $user = User::where('role','Admin')->first();
            $response = $this->actingAs($user)
                ->get(route('barangmasuk.index'));
            $response->assertStatus(200)
            ->assertSee('Masuk');
    }

    public function testCreateBarangMasuk()
    {
        $user = User::where('role', 'Admin')->first();
            $response = $this->actingAs($user)
                ->post(route('barangmasuk.store'), [
                    'kodebarang_barangmasuk' => '2',
                    'tanggal_barangmasuk' => '2022-09-22',
                    'nama_barangmasuk' => 'Laptop',
                    'jenis_barangmasuk' => 'Barang Kantor',
                    'jumlah' => '12',
                    'total_barangmasuk' => '2',
                    'satuan' => 'PCS',
                    'penerima_barangmasuk' => 'Pesulap MErah',
                    'foto_barangmasuk' => UploadedFile::fake()->create('test4.jpg', 1024),
                ]);
            $response->assertStatus(302);
    }

    public function testEditBarangMasuk()
    {
        $user = User::where('role', 'Admin')->first();
        $response = $this->actingAs($user)
            ->put(route('barangmasuk.update', '3'), [ 
                'kodebarang_barangmasuk' => '3',
                'nama_barangmasuk' => 'Formulir Promosi',
                'jenis_barangmasuk' => 'Promosi',
                'satuan' => 'PCS',
                'penerima_barangmasuk' => 'MANTAP UY',
                'tanggal_barangmasuk' => '2022-09-22',
                'foto' => UploadedFile::fake()->create('HAYUU.jpg', 1024),
            ]);

        $response->assertStatus(302);
    }

    public function testHapusBarangMasuk()
    {
        $user = User::where('role','Admin')->first();
        $response = $this->actingAs($user)->delete(route('barangmasuk.destroy','5'));
        $response->assertStatus(302);
    }

     public function testLihatBarangKeluar()
    {
        $user = User::where('role','Admin')->first();
            $response = $this->actingAs($user)
                ->get(route('barangkeluar.index'));
            $response->assertStatus(200)
            ->assertSee('Keluar');
    }

    public function testCreateBarangKeluar()
    {
        $user = User::where('role', 'Admin')->first();
            $response = $this->actingAs($user)
                ->post(route('barangkeluar.store'), [
                'kodebarang_barangkeluar' => '2',
               'tanggal_barangkeluar' => '2022-09-22',
               'nama_barangkeluar' => 'Laptop',
               'jenis_barangkeluar' => 'Barang Kantor',
               'jumlah' => '14',
               'total_barangkeluar' => '2',
               'satuan' => 'PCS',
               'pengambil_barangkeluar' => 'daadada',
                ]);
            $response->assertStatus(302);
    }

    public function testEditBarangKeluar()
    {
        $user = User::where('role', 'Admin')->first();
        $response = $this->actingAs($user)
            ->put(route('barangkeluar.update', '2'), [ 
                'kodebarang_barangkeluar' => '1',
                'nama_barangkeluar' => 'Formulir Promosi',
                'jenis_barangkeluar' => 'Promosi',             
                'satuan' => 'PCS',
                'pengambil_barangkeluar' => 'ridho EDITT dari test',
                'tanggal_barangkeluar' => '2022-09-22',
            ]);

        $response->assertStatus(302);
    }

    public function testHapusBarangKeluar()
    {
        $user = User::where('role','Admin')->first();
        $response = $this->actingAs($user)->delete(route('barangkeluar.destroy','5'));
        $response->assertStatus(302);
    }
    
      public function testLihatDataPeminjamBarang()
    {
        $user = User::where('role','Admin')->first();
            $response = $this->actingAs($user)
                ->get(route('peminjambarang.index'));
            $response->assertStatus(200)
            ->assertSee('Data Peminjam');
    }

    public function testCreateDataPeminjamBarang()
    {
        $user = User::where('role', 'Admin')->first();
            $response = $this->actingAs($user)
                ->post(route('peminjambarang.store'), [
                    'Nama_peminjam' => 'WIRA CREATE',
                    'Nama_barang' => '1',
                    'Keperluan_pinjam' => 'CREATEs',
                    'Tanggal_pinjam' => '2022-09-22',
                ]);
            $response->assertStatus(302);
    }

    public function testEditDataPeminjamBarang()
    {
        $user = User::where('role', 'Admin')->first();
        $response = $this->actingAs($user)
            ->put(route('peminjambarang.update', '3'), [ 
                'nama_peminjam' => 'WIRA EDIT',
                'stok_id' => '1',
                'keperluan' => 'EDIT DET',
                'tanggal_pinjam' => '2022-09-22',
            ]);

        $response->assertStatus(302);
    }

    public function testHapusDataPeminjamBarang()
    {
        $user = User::where('role','Admin')->first();
        $response = $this->actingAs($user)->delete(route('peminjambarang.destroy','6'));
        $response->assertStatus(302);
    }
}
