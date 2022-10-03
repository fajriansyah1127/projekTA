<?php

namespace App\Http\Controllers;

use App\Models\User;

use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Exception;

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
        return view('User.Index', compact('user'));
        
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
            'Foto' => 'required|file|image|mimes:jpg,jpeg,bmp,png|max:2048',

        ]);
        $request['Password'] = hash::make($request['Password']); 
        
        if ( $file = Request()->Foto) {
            $filename = Request()->Nama . date('dmy') . '.' . $file->extension();
            $file->move(public_path('foto'), $filename);
        }else{
            $filename = 'User'.'.'.'jpg';
        }

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
    public function update(Request  $request, $id)
    {
        $this->validate($request, [
            'nama' => 'required',
            'kontak' => 'nullable',
            'alamat' => 'required',
            'role' => 'required',
            'jabatan' => 'nullable',
            'foto' => 'nullable|mimes:jpg,jpeg,bmp,png|max:10000',

        ]);
        $user = User::find($id);
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
            Alert::alert('DATA BERHASIL DIUBAH');
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
    public function destroy($id)
    {
        $user = User::find($id);
        
        // try {
        //         $user->delete();
        //         File::delete('foto/' .$user->foto);
        //         return redirect()->back();
        //         }
        //         catch (Exception $e){
        //             Alert::alert('ERROR', 'Terdapat Masalah Dalam Menghapus');
        //             return redirect()->back();
        //         }
        
        //         Alert::toast('Data Berhasil Dihapus', 'success');
        //         return redirect()->back();
              
                    $user->delete();
                    File::delete('foto/' .$user->foto);
                    
            
                    Alert::toast('Data Berhasil Dihapus', 'success');
                    return redirect()->back();
        
    }
}
