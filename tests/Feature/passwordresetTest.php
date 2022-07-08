<?php

namespace Tests\Feature;

use Hash;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Foundation\Testing\WithFaker;
use Notification;
use Password;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Tests\TestCase;

class passwordresettesting extends TestCase
{
    use WithFaker;

    const ROUTE_PASSWORD_EMAIL = 'password.email';
    const ROUTE_PASSWORD_REQUEST = 'password.request';
    const ROUTE_PASSWORD_RESET = 'password.reset';
    const ROUTE_PASSWORD_RESET_SUBMIT = 'password.update';

    const USER_ORIGINAL_PASSWORD = 'secret';

    public function testMenampilkanHalamanPassword()
{
    $this
        ->get(route(self::ROUTE_PASSWORD_REQUEST))
        ->assertSuccessful()
        ->assertSee('You forgot your password? Here you can easily retrieve a new password.')
        ->assertSee('E-Mail Address')
        ->assertSee('Send Password Link');
}

public function testPasswordResetRequestEmailNotFound()
{
    $this
        ->followingRedirects()
        ->from(route(self::ROUTE_PASSWORD_REQUEST))
        ->post(route(self::ROUTE_PASSWORD_EMAIL), [
            'email' => 'fajriansyah5723@gmail.com',
        ])
        ->assertSuccessful()
        ->assertSee(' find a user with that email address');
        
}

public function testPasswordResetRequestEmailInvalid()
{
    $this
        ->followingRedirects()
        ->from(route(self::ROUTE_PASSWORD_REQUEST))
        ->post(route(self::ROUTE_PASSWORD_EMAIL), [
            'email' => 'fajriansyah5723gmail.com',
        ])
        ->assertSuccessful()
        // ->assertStatus(200)
        ->assertSee('The email must be a valid email address.');
        
}


// public function test_Login_sebagai_admin()
//     {
//         $this->post('password/email', [
//             '_token' => '4sZHsjIfT57joF7dan2lcCe769LmLpNOXJVdaijl',
//             'email' => 'fajriansyah573@gmail.com',
//         ])

//         // $this->assertAuthenticated();
//         ->assertSuccessful()
//         // ->assertStatus(302)
//         ->assertSee('We have emailed your password reset link!');
//     }

public function testSubmitPasswordResetRequest()
{
    $this
        ->followingRedirects()
        ->from(route(self::ROUTE_PASSWORD_REQUEST))
        ->post(route(self::ROUTE_PASSWORD_EMAIL), [
            'email' => 'fajriansyah573@gmail.com',
        ])
        ->assertSuccessful()
        //->assertStatus(200)
        ->assertSee('We have emailed your password reset link!');

    //     $response = $this->post(route(self::ROUTE_PASSWORD_EMAIL), [
    //         'email' => 'fajriansyah573@gmail.com',
    //     ]);

    // $response->assertStatus(302)->assertSee('We have emailed your password reset link!');
    // $request = [
    //     'email' => 'fajriansyah573@gmail.com',
    // ];
    // $response = $this->post(route('password.email'),$request);

    // $response->assertStatus(302)->assertSee('We have emailed your password reset link!');
}

public function testSubmitPasswordResetRequestpage()
{
    $user = User::where('id',1)
    ->first();
    $token = Password::broker()->createToken($user);

    $this
        ->get(route(self::ROUTE_PASSWORD_RESET, [
            'token' => $token,
        ]))
        ->assertSuccessful()
        ->assertSee('Reset Password')
        ->assertSee('Email')
        ->assertSee('Password')
        ->assertSee('Confirm Password');
}

public function testSubmitPasswordReset()
{
    $user = User::where('id',1)
    ->first();

    $token = Password::broker()->createToken($user);

    $password = 'qwertyuiop';

    $this
        ->followingRedirects()
        ->from(route(self::ROUTE_PASSWORD_RESET, [
            'token' => $token,
        ]))
        ->post(route(self::ROUTE_PASSWORD_RESET_SUBMIT), [
            'token' => $token,
            'email' => $user->email,
            'password' => $password,
            'password_confirmation' => $password,
        ])
        ->assertSuccessful()
        ->assertStatus(200);

    $user->refresh();

    $this->assertFalse(Hash::check(self::USER_ORIGINAL_PASSWORD,
        $user->password));

    $this->assertTrue(Hash::check($password, $user->password));
}
// public function testShowPasswordResetPage()
// {
//     $user = factory(User::class)->create();

//     $token = Password::broker()->createToken($user);

//     $this
//         ->get(route(self::ROUTE_PASSWORD_RESET, [
//             'token' => $token,
//         ]))
//         ->assertSuccessful()
//         ->assertSee('Reset Password')
//         ->assertSee('E-Mail Address')
//         ->assertSee('Password')
//         ->assertSee('Confirm Password');
// }

// public function testSubmitPasswordResetInvalidEmail()
// {
//     $user = factory(User::class)->create([
//         'password' => bcrypt(self::USER_ORIGINAL_PASSWORD),
//     ]);

//     $token = Password::broker()->createToken($user);

//     $password = str_random();

//     $this
//         ->followingRedirects()
//         ->from(route(self::ROUTE_PASSWORD_RESET, [
//             'token' => $token,
//         ]))
//         ->post(route(self::ROUTE_PASSWORD_RESET_SUBMIT), [
//             'token' => $token,
//             'email' => str_random(),
//             'password' => $password,
//             'password_confirmation' => $password,
//         ])
//         ->assertSuccessful()
//         ->assertSee(__('validation.email', [
//             'attribute' => 'email',
//         ]));

//     $user->refresh();

//     $this->assertFalse(Hash::check($password, $user->password));

//     $this->assertTrue(Hash::check(self::USER_ORIGINAL_PASSWORD,
//         $user->password));
// }


}
// routnye password.request ( ke form email) -> password.email (mengirim token email) -> password.reset (yang ada token menampilkan reset.blade ) -> setelah itu password.update