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

class iterasi1 extends TestCase
{
    use WithFaker;
   //use WithoutMiddleware;

    public function test_Login_sebagai_admin()
    {
         $response = $this->post('/auth', [
            'email' => 'fajriansyah573@gmail.com',
            'password' => 'qwertyuiop',
        ]);

        $this->assertAuthenticated();
        $response->assertRedirect(RouteServiceProvider::HOME);
    }

    // public function test_tambah_data_user_()
    // {
    //     $user = User::where('role', 'Admin')->first();
    //         $response = $this->actingAs($user)
    //             ->post(route('user.store'), [
    //                 'Nama' => $this->faker->name(),
    //                 'Email' => $this->faker->email(),
    //                 'Kontak' =>  $this->faker->phoneNumber(),
    //                 'Alamat' => $this->faker->address(),
    //                 'Role' => 'Admin',
    //                 'Jabatan' => $this->faker->jobTitle,
    //                 'Password' => 'asdfghjkl',
    //                 'Foto' => UploadedFile::fake()->create('testing.jpg', 1024),
    //             ]);

    //         $response->assertStatus(302);
    // }


    public function test_lihat_data_user()
    {
        // Storage::fake('avatars');
        // $file = UploadedFile::fake()->image('avatar.jpg');
        $user = User::where('role','Admin')->first();
            $response = $this->actingAs($user)
                ->get(route('user.show', [ 'user' => 1, ]));

            $response->assertStatus(200);
    }

    // public function test_edit_user()
    // {
    //     $user = User::where('id','55')->first();
    //     $response = $this->actingAs($user)
    //         ->put(route('user.update', '55'), [
    //         'nama' => 'fasriansyah',
    //         'email' =>'fansyah559@gmail.com',
    //         'kontak' =>  $this->faker->phoneNumber(),
    //         'alamat' => $this->faker->address(),
    //         'role' => 'Admin',
    //         'jabatan' => $this->faker->jobTitle,
    //         'password' => 'asdfghjkl',
    //         'foto' => UploadedFile::fake()->create('testing3.jpg', 1024),
    //         ]);

    //     $response->assertStatus(302);
    // }

    public function test_hapus_user()
    {
        $user = User::where('role','Admin')->first();
        $response = $this->actingAs($user)->delete(route('user.destroy','101'));
        $response->assertStatus(302);

    }

    public function test_lihat_profil()
     {
        $user = User::where('id','55')
        ->first();

        $response = $this->actingAs($user)
        ->get(route('profile.show','fasriansya'));
        
        $response->assertSuccessful()
        ->assertSee('fasriansya')
        ->assertSee('Biodata');
     }

    public function test_edit_profile()
    {
        $user = User::where('id','57')->first();
        $response = $this->actingAs($user)
            ->put(route('profile.update', '57'), [
            'nama' => 'Fikri JAGO',
            'email' => 'kelapaaa224@gmail.com',
            'kontak' =>  $this->faker->phoneNumber(),
            'alamat' => $this->faker->address(),
            'role' => 'Admin',
            'jabatan' => $this->faker->jobTitle,
            'password' => 'asdfghjkl',
            'foto' => UploadedFile::fake()->create('testing3.jpg', 1024),
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
