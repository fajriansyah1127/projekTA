<?php

namespace App\Http\Controllers;

use App\Models\User;

use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $user )
    {
        $user = User::get();
        return view('User.User', compact('user'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('User.RegisterUser');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'Nama' => 'required',
            'Email' => 'required|email:dns|unique:users',
            'Kontak' => 'required',
            'Alamat' => 'required',
            'Role' => 'required',
            'Jabatan' => 'required',
            'Password' => 'required|min:8',
            'Foto' => 'required|mimes:jpg,jpeg,bmp,png|max:10000',

        ]);
        $request['Password'] = hash::make($request['Password']); 
        $file = Request()->Foto;
        $filename = Request()->Nama . date('dmy') . '.' . $file->extension();
        $file->move(public_path('foto'), $filename);

        $notif = User::create([
            'nama' => $request->Nama,
            'email' => $request->Email,
            'kontak' => $request->Kontak,
            'alamat' => $request->Alamat,
            'jabatan' => $request->Jabatan,
            'role' => $request->Role,
            'foto' => $filename,
            'password' =>$request->Password,
        ]);


        if ($notif) {
            //redirect dengan pesan sukses
            alert()->success('Success', 'JOSSS DATANYA SUDAH MASUK');
            return redirect('/user');
        } else {
            //redirect dengan pesan error
            alert()->error('Gagal', 'GAGAL BRO NDA BISA MASUK Di ulangi lagi');
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('User.UserProfile', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(user $user)
    {
        return view('User.EditUser', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request  $request, User $user)
    {
        $this->validate($request, [
            'nama' => 'required',
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
            File::delete('foto/' . $user->foto);
            $destinationPath = 'foto/';
            $filename = Request()->nama . date('dmy') . '.' . $file->extension();
            $file->move($destinationPath, $filename);
            $inter['foto'] = "$filename";
        } 
        $user->update($inter);
        if ($user) {
            //redirect dengan pesan sukses
            Alert::alert('Data Berhasil Diubah', 'success');
            return redirect()->route('user.index');
        } else {
            //redirect dengan pesan error
            return redirect()->route('user.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,User $user)
    {
        $user->delete();
        File::delete('foto/' . $user->foto);
        Alert::alert('Data Berhasil DiHAPUS', 'success');
        return redirect()->back();
    }
}
