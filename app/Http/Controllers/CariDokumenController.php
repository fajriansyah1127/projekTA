<?php

namespace App\Http\Controllers;
use Exception;
use App\Models\CariBarang;
use App\Models\Dokumen;
use App\Models\Asuransi;
use App\Models\Outlet;
use App\Models\Produk;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use PhpParser\Node\Stmt\ElseIf_;
use Vinkla\Hashids\Facades\Hashids;

class CariDokumenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dokumenproduk = Produk::with('asuransi')->get();
        $dokumenoutlet = Outlet::get();
        return view('home', compact('dokumenproduk','dokumenoutlet'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dokumen = Produk::with('asuransi')->get();
        $dokumens = Outlet::get();
        return view('CariDokumen.create', compact('dokumen','dokumens'));
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
            'nama' => 'nullable',
            'nomor' => 'nullable',
            'asuransi' => 'nullable',
            'outlet' => 'nullable',
            'tanggal' => 'nullable',
            'produk' => 'nullable',
         ]); 
   
         $DokumenRole = Dokumen::with('user','produk','outlet')
        //  ->where('user_id', Auth::user()->id)
         ->orwhere('nama',$request->nama)
         ->orWhere('nomor_akad', $request->nomor)
         ->orWhere('outlet_id', $request->outlet)
         ->orWhere('tanggal_klaim', $request->tanggal)
         ->orWhere('produk_id', $request->produk)
         ->get();

    //     $notif = Dokumen::create([
    //         'nama' => $request->nama_dokumen,
    //         'nomor_akad' => $request->nomor_dokumen,
    //         'outlet_id' => $request->outlet_dokumen,
    //         'tanggal_klaim' => $request->tanggal_dokumen,
    //         'produk_id' => $request->produk_dokumen,
    //         'file' => $filename,
    //         'nama_pengupload' => Auth::user()->nama,
    //         'user_id' => Auth::user()->id,
    //     ]);

       if($DokumenRole->first()) {
           //redirect dengan pesan sukses
           alert()->success('Success', 'Dokumennya Ada Silahkan Login Terlebih Dahulu');
           return redirect('/');
       } else {
           //redirect dengan pesan error
           alert()->error('Gagal', 'Dokumennya tidak ada');
           return redirect('/');
       }
         return request()->all();
        //return view ('CariDokumen.Index', compact('DokumenRole'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CariBarang  $cariBarang
     * @return \Illuminate\Http\Response
     */
    public function show(CariBarang $cariBarang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CariBarang  $cariBarang
     * @return \Illuminate\Http\Response
     */
    public function edit(CariBarang $cariBarang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CariBarang  $cariBarang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CariBarang $cariBarang)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CariBarang  $cariBarang
     * @return \Illuminate\Http\Response
     */
    public function destroy(CariBarang $cariBarang)
    {
        //
    }
}
