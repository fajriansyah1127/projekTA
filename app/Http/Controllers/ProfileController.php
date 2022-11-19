<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\User;
use App\Models\Riwayat;
use Illuminate\Support\Facades\Hash;


class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profile = Auth::user();
        return view('Profile.Profile', compact('profile'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($profile)
    {
        $profile = Auth::user();
        return view('Profile.Profile', compact('profile'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($profile)
    {
        $profile = Auth::user();
        return view('Profile.EditProfile', compact('profile'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request  $request, User $profile)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . Auth::user()->id,
            'kontak' => 'nullable',
            'alamat' => 'nullable',
            'jabatan' => 'nullable',
            'current_password' => 'nullable|required_with:new_password',
            'new_password' => 'nullable|min:8|required_with:current_password|max:20',
            'password_confirmation' => 'nullable|min:8|required_with:new_password|same:new_password',
            'foto' => 'nullable|file|mimes:jpg,png,jpeg,gif,svg,jfif|max:2048',
        ]);

        $user = User::findOrFail(Auth::user()->id);

        if ($request->hasFile('foto')) {
            File::delete('foto/'.$user->foto);
            $file = $request->file('foto');
            $filename = Request()->nama . date('dmy') . '.' . $file->extension();
            $file->move('foto/', $filename);
            $user['foto'] = $filename;
        }
       
        $user->nama = $request->input('nama');
        $user->kontak = $request->input('kontak');
        $user->email = $request->input('email');
        $user->alamat = $request->input('alamat');
        $user->jabatan = $request->input('jabatan');

        if (!is_null($request->input('current_password'))) {
            if (Hash::check($request->input('current_password'), $user->password)) {
                $user->password = Hash::make($request->input('new_password'));
            } else {
                Alert::toast('Password Lama Tidak Sesuai!', 'error');
                return redirect()->back();
            }
        }
        Riwayat::create([
            'user_id' => Auth::user()->id,
            'nama' => Auth::user()->nama,
            'aktivitas' => 'Mengubah Data Profil'
        ]);
        $user->save();
        Alert::alert('DATA BERHASIL DIUBAH');
        return redirect()->route('profile.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
