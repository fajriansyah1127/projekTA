<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Asuransi;
Use App\Models\BarangMasuk;
Use App\Models\BarangKeluar;
Use App\Models\Dokumen;
Use App\Models\Outlet;
Use App\Models\Peminjam;
Use App\Models\Produk;
Use App\Models\Satuan;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Dokumen $id)
    {
        $DokumenSatpamdanMagang = DB::table('dokumens')
        ->where('user_id', Auth::user()->id)
        ->count('id');
        $DokumenAdmindanPegawai = DB::table('dokumens')
        ->count('id');
        $BanyakUser = DB::table('users')
        ->count('id');
        $BanyakPeminjam  = DB::table('peminjams')
        ->count('id');
        // $BarangMasuk = BarangMasuk::get()->count();
        // $BarangKeluar = BarangKeluar::get()->count();
        // $Dokumen = Dokumen::get()->count();
        // $Outlet = Outlet::get()->count();
        // $Asuransi = Asuransi::get()->count();
        // $Peminjam = Peminjam::get()->count();
        // $Produk = Produk::get()->count();
        // $Satuan = Satuan::get()->count();

        // return view('index', compact('karwa', 'bah', 'supp', 'res'));
        return view('index', compact('DokumenSatpamdanMagang','DokumenAdmindanPegawai','BanyakUser','BanyakPeminjam'));
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
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
