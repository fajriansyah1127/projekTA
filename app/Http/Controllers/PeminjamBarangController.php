<?php

namespace App\Http\Controllers;

use App\Models\PeminjamBarang;
use App\Models\Stok;
use RealRashid\SweetAlert\Facades\Alert;
use Exception;
use Illuminate\Http\Request;

class PeminjamBarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(PeminjamBarang $peminjambarang)
    {
        $peminjambarang = PeminjamBarang::with('stok')->get();
        //$peminjambarang = PeminjamBarang::with('stok')->get();
        $stok = Stok::where('jumlah','>', 0)->get();
        return view('PeminjamBarang.Index', compact('stok','peminjambarang'));
        // return view('PeminjamBarang.Index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $stok = Stok::get();
        return view('PeminjamBarang.Create', compact('stok'));
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
            'Nama_peminjam' => 'required',
            'Nama_barang' => 'required',
            'Keperluan_pinjam' => 'required',
            'Tanggal_pinjam' => 'required',
          ]);

        $notif = PeminjamBarang::create([
            'nama_peminjam' => $request->Nama_peminjam,
            'stok_id' => $request->Nama_barang,
            'keperluan' => $request->Keperluan_pinjam,
            'tanggal_pinjam' => $request->Tanggal_pinjam,
        ]);
       if ($notif) {
           //redirect dengan pesan sukses
           alert()->success('Success', 'JOSSS DATANYA SUDAH MASUK');
           return redirect('/peminjambarang');
       } else {
           //redirect dengan pesan error
           alert()->error('Gagal', 'GAGAL BRO NDA BISA MASUK Di ulangi lagi');
           return redirect()->back();
       }
        //  return request()->all();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PeminjamBarang  $peminjamBarang
     * @return \Illuminate\Http\Response
     */
    public function show(PeminjamBarang $peminjamBarang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PeminjamBarang  $peminjamBarang
     * @return \Illuminate\Http\Response
     */
    public function edit(PeminjamBarang $peminjamBarang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PeminjamBarang  $peminjamBarang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $this->validate($request, [
            'nama_peminjam' => 'required',
            'stok_id' => 'required',
            'keperluan' => 'required',
            'tanggal_pinjam' => 'required',
          ]);
        
        $peminjam = PeminjamBarang::find($id);
        $doku =  $request->all();
        $peminjam->update($doku);
        if ($peminjam) {
            //redirect dengan pesan sukses
            Alert::alert('DATA BERHASIL DIUBAH');
            return redirect()->route('peminjambarang.index');
        } else {
            //redirect dengan pesan error
            return redirect()->route('peminjambarang.edit')->with(['error' => 'Data Gagal Disimpan!']);
        }
        // return $request->all();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PeminjamBarang  $peminjamBarang
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $peminjam = PeminjamBarang::find($id);
        try {
            $peminjam->delete();
        } catch (Exception $e){
            Alert::alert('ERROR', 'Terdapat Masalah Dalam Menghapus');
            return redirect()->back();
        }

        Alert::toast('Data Berhasil Dihapus', 'success');
        return redirect()->back();
    }
}
