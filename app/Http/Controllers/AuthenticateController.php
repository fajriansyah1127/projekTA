<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use App\Providers\RouteServiceProvider;
use App\Models\Riwayat;

class AuthenticateController extends Controller
{
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required'
        ]);
 
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            Riwayat::create([
                'user_id' => Auth::user()->id,
                'nama' => Auth::user()->nama,
                'aktivitas' => 'Login ke dalam sistem'
            ]);
            Alert::toast('Semoga Hari mu Menyenangkan', 'success');
            return redirect()->intended(RouteServiceProvider::HOME);
        }
        Alert::toast(' Email atau Passwordnya Salah', 'error');
        return back()->with('loginError','Login GAGAL');
    }

    public function logout(Request $request)
    {
        Auth::logout();
 
        $request->session()->invalidate();
     
        $request->session()->regenerateToken();
     
        return redirect('/');
    }
}
