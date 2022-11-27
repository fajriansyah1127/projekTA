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

    public function testMelihatSampahDokumen()
    {
        $user = User::where('role','Admin')->first();
                $response = $this->actingAs($user)
                    ->get(route('trash'));
                $response->assertStatus(200);
    }

    public function testRestore()
    {
        $user = User::where('role','Admin')->first();
        $response = $this->actingAs($user)->get(route('restore','WezGbqwyoJ'));
        $response->assertStatus(302);
    }

    public function testHapusPermanen()
    {
        $user = User::where('role','Admin')->first();
        $response = $this->actingAs($user)->delete(route('hapus_permanen','52yr7zQvdp'));
        $response->assertStatus(302);
    }
}
