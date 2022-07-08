<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\User;
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
        return view('Profile.profile', compact('profile'));
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
        $this->validate($request, [
            'nama' => 'nullable',
            'email' => 'sometimes|required|email:dns|unique:users',
            'kontak' => 'nullable',
            'alamat' => 'nullable',
            'role' => 'nullable',
            'jabatan' => 'nullable',
            'password' => 'nullable|min:8',
            'foto' => 'nullable|mimes:jpg,jpeg,bmp,png|max:10000',
        ]);
        $request['password'] = hash::make($request['password']); 
        $inter = $request->all(); 

        if ($file = $request->file('foto')) {
            File::delete('foto/' . $profile->foto);
            $destinationPath = 'foto/';
            $filename = Request()->nama . date('dmy') . '.' . $file->extension();
            $file->move($destinationPath, $filename);
            $inter['foto'] = "$filename";
        } 
        $profile->update($inter);
        if ($profile) {
            //redirect dengan pesan sukses
            Alert::alert('Data Berhasil Diubah', 'success');
            return redirect()->route('profile.index');
        } else {
            //redirect dengan pesan error
            return redirect()->route('profile.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
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
