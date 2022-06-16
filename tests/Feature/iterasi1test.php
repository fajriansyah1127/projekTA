<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Auth\User as Authenticatable;

class iterasi1 extends TestCase
{
    use WithFaker;

    public function test_Login()
    {
         $response = $this->post('/auth', [
            'email' => 'fajriansyah573@gmail.com',
            'password' => 'asdfghjkl',
        ]);

        $this->assertAuthenticated();
        $response->assertRedirect(RouteServiceProvider::HOME);
    }
    // public function test_users_can_authenticate_using_the_login_screen()
    // {
    //     // $user = User::factory()->create();

    //     $response = $this->post('/auth', [
    //         'email' => 'fajriansyah573@gmail.com',
    //         'password' => 'asdfghjkl',
    //     ]);

    //     $this->assertAuthenticated();
    //     $response->assertRedirect(RouteServiceProvider::HOME);
    // 
    // }  i
    
    public function test_tambah_data_user()
    {
        Storage::fake('avatars');
        $file = UploadedFile::fake()->image('avatar.jpg');
        $user = User::factory()->create();
        $response = $this->get->post(route('user.store'), [
            'nama' => $user->nama,
            'email' => $user->email,
            'kontak' => $user->kontak,
            'alamat' => $user->alamat,
            'jabatan' => $user->jabatan,
            'role' => $user->role,
            'foto' => $file,
            'password' =>$user->password,
        ]);

        $response->assertStatus(302);
    }

    public function test_lihat_data_user()
    {
        // $user= ([
        //              'email' => 'fajriansyah573@gmail.com',
        //              'password' => 'asdfghjkl',
        //        ]);
        // $user = User::factory()->create();
        // $response = $this->actingAs($user)
        //     ->get(route('user.index'));
        $response = $this->get(route('user.show', [ 'user' => 1, ]));
        $response->assertStatus(302);
    }

    public function test_lihat_user()
    {
        $response = $this->get(route('user.index'));
        $response->assertStatus(302);
    }

    public function test_edit_data_user()
    {
        Storage::fake('avatars');
        $file = UploadedFile::fake()->image('avatar.png');
        $user = User::factory()->create();
        $response = $this->get->put(route('user.update'), [
            'nama' => $user->nama,
            'email' => $user->email,
            'kontak' => $user->kontak,
            'alamat' => $user->alamat,
            'jabatan' => $user->jabatan,
            'role' => $user->role,
            'foto' => $file,
            'password' =>$user->password,
        ]);

        $response->assertStatus(302);
    }

    public function test_hapus_data_user()
    {
        $response = $this->get(route('user.destroy', [ 'user' => 19, ]));
        $response->assertStatus(302);
    }

    public function test_lihat_profil()
    {
        $response = $this->get(route('profile.index', [ 'user' => 1, ]));
        $response->assertStatus(302);
    }

    public function test_edit_profile()
    {
        $response = $this->get(route('profile.update', [ 
            'user' => 3,
            'password' => 'baruini', 
        
        ]));
        $response->assertStatus(302);
    }

    // public function test_reset_password()
    // {
    //     $response = $this->get(route('profile.index', [ 
    //         'user' => 1,
    //         'password' => 'baruini', 
        
    //     ]));
    //     $response->assertStatus(302);
    // }

    // public function test_hapus_hak_cipta()
    // {
    
    //     $HakCipta = User::factory()->create();
    //     $user = User::factory()->create();
    //     $response = $this->actingAs($user)
    //         ->delete(route('HakCipta.destroy', $HakCipta->id));
    //     $response->assertStatus(302);

    //     $this->get('/login')
    //          ->see('Laravel')
    //          ->dontSee('Rails');

    // }

}
