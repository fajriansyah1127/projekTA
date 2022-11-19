<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class iterasi1 extends TestCase
{
   use WithFaker;
   use WithoutMiddleware;

    public function test_Login()
    {
         $response = $this->post('/auth', [
            'email' => 'fajriansyah573@gmail.com',
            'password' => 'asdfghjklkjh',
        ]);

        $this->assertAuthenticated();
        // $response->assertRedirect(RouteServiceProvider::HOME);
    }

    // public function test_Login_Pegawai()
    // {
    //      $response = $this->post('/auth', [
    //         'email' => 'fajriansyah573@gmail.com',
    //         'password' => 'asdfghjkl',
    //     ]);

    //     $this->assertAuthenticated();
    //     // $response->assertRedirect(RouteServiceProvider::HOME);
    // }


    // public function test_Login_Satpam()
    // {
    //      $response = $this->post('/auth', [
    //         'email' => 'fajriansyah573@gmail.com',
    //         'password' => 'asdfghjkl',
    //     ]);

    //     $this->assertAuthenticated();
    //     // $response->assertRedirect(RouteServiceProvider::HOME);
    // }

    // public function test_LoginMagang()
    // {
    //      $response = $this->post('/auth', [
    //         'email' => 'fajriansyah573@gmail.com',
    //         'password' => 'asdfghjkl',
    //     ]);

    //     $this->assertAuthenticated();
    //     // $response->assertRedirect(RouteServiceProvider::HOME);
    // }


    public function test_tambah_user_()
    {
        $user = User::where('role', 'Admin')->first();
            $response = $this->actingAs($user)
                ->post(route('user.store'), [
                    'Nama' => $this->faker->name(),
                    'Email' => 'admin@gmail.com',
                    'Kontak' =>  $this->faker->phoneNumber(),
                    'Alamat' => $this->faker->address(),
                    'Role' => 'Admin',
                    'Jabatan' => $this->faker->jobTitle,
                    'Password' => 'asdfghjklkjh',
                    'Foto' => UploadedFile::fake()->create('test4.jpg', 1024),
                    
                ]);
                $this->withoutExceptionHandling();
             $response->assertStatus(302);
            //$response->assertSuccessful();
    }


    public function test_lihat_data_user()
    {
        // Storage::fake('avatars');
        // $file = UploadedFile::fake()->image('avatar.jpg');
        $user = User::where('role','Admin')->first();
            $response = $this->actingAs($user)
                ->get(route('user.show', [ 'user' => 1, ]));

            $response->assertStatus(200);
    }

    public function test_edit_user()
    {
        $user = User::where('id','1')->first();
        $response = $this->actingAs($user)
            ->put(route('user.update', '2'), [
            'nama' => 'Riki Pernanda',
            'kontak' =>  $this->faker->phoneNumber(),
            'alamat' => $this->faker->address(),
            'role' => 'Admin',
            'jabatan' => $this->faker->jobTitle,
            'foto' => UploadedFile::fake()->create('testing3.jpg', 1024),
            ]);

        $response->assertStatus(302);
    }

    public function test_hapus_user()
    {
        $user = User::where('role','Admin')->first();
        $response = $this->actingAs($user)->delete(route('user.destroy','7'));
        $response->assertStatus(302);
    }

    public function test_lihat_profil()
     {
        $user = User::where('id','3')
        ->first();

        $response = $this->actingAs($user)
        ->get(route('profile.show','fajriansyah'));
        
        $response->assertSuccessful()
        ->assertSee('fajriansyah')
        ->assertSee('Biodata');
     }

    public function test_edit_profile()
    {
        $user = User::where('id','2')->first();
        $response = $this->actingAs($user)
            ->put(route('profile.update', '2'), [
            'nama' => $this->faker->name(),
            'email' => 'kelapaaa224@gmail.com',
            'kontak' =>  $this->faker->phoneNumber(),
            'alamat' => $this->faker->address(),
            'role' => 'Admin',
            'jabatan' => $this->faker->jobTitle,
            'current_password' => 'asdfghjk',
            'new_password' => 'asdfghjklkjh',
            'password_confirmation' => 'asdfghjklkjh',
            'foto' => UploadedFile::fake()->create('testing3.jpg', 1024),
            ]);

        $response->assertStatus(302);
    }

    public function test_edit_password()
    {
        $user = User::where('id','1')->first();
        $response = $this->actingAs($user)
            ->put(route('profile.update', '2'), [
            'current_password' => 'asdfghjklkjh',
            'new_password' => 'asdfghjklkjh',
            'password_confirmation' => 'asdfghjklkjh',
            ]);

        $response->assertStatus(302);
    }

    // public function test_lihat_data_user_dengan_role_satpam()
    // {
    //     // Storage::fake('avatars');
    //     // $file = UploadedFile::fake()->image('avatar.jpg');
    //     $user = User::where('role', 'Satpam')->first();
    //         $response = $this->actingAs($user)
    //             ->get(route('user.show', [ 'user' => 1, ]));

    //         $response->assertStatus(200);
    // }

    // public function test_lihat_data_user_dengan_role_pegawai()
    // {
    //     // Storage::fake('avatars');
    //     // $file = UploadedFile::fake()->image('avatar.jpg');
    //     $user = User::where('role', 'Pegawai')->first();
    //         $response = $this->actingAs($user)
    //             ->get(route('user.show', [ 'user' => 1, ]));

    //         $response->assertStatus(200);
    // }

    // public function test_lihat_data_user_dengan_role_magang()
    // {
    //     // Storage::fake('avatars');
    //     // $file = UploadedFile::fake()->image('avatar.jpg');
    //     $user = User::where('role', 'Magang')->first();
    //         $response = $this->actingAs($user)
    //             ->get(route('user.show', [ 'user' => 1, ]));

    //         $response->assertStatus(200);
    // }

    // public function test_reset_password()
    // {
    //     $response = $this->get(route('profile.index', [ 
    //         'user' => 1,
    //         'password' => 'baruini', 
        
    //     ]));
    //     $response->assertStatus(302);
    // }

    
    

}
