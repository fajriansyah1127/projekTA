<?php

namespace App\Http\Controllers;
Use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class KontakController extends Controller
{
    public function index(User $id)
    {
        $kontak = DB::table('users')
        ->where('role', 'Admin')
        ->orwhere('role', 'pegawai')
        ->orwhere('role', 'satpam')
        ->get();
        return view('Kontak.Index', compact('kontak'));
    }

    public function show(User $id)
    {
        $kontak = DB::table('users')
        ->where('role', 'Admin')
        ->orwhere('role', 'pegawai')
        ->orwhere('role', 'satpam')
        ->get();
        return view('Kontak.Show', compact('kontak'));
    }
}
