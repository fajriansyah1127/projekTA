<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use App\Models\Dokumen;
use App\Models\User;
use Illuminate\Http\UploadedFile;

class SoftdeleteTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    use WithFaker;
    use WithoutMiddleware;

   
// SOFTDELETE

    public function testRestore()
    {
        $user = User::where('role','Admin')->first();
        $response = $this->actingAs($user)->get(route('restore','B1VQ91QRba'));
        $response->assertStatus(302);
    }



    public function testHapusPermanen()
    {
        $user = User::where('role','Admin')->first();
        $response = $this->actingAs($user)->delete(route('hapus_permanen','jgaGgmr1NL'));
        $response->assertStatus(302);
    }
}
