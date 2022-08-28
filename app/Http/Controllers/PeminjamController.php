<?php

namespace App\Http\Controllers;

use App\Models\Dokumen;
use App\Models\Peminjam;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Exception;

class PeminjamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Peminjam $peminjam)
    {
        $peminjam = Peminjam::with('dokumen')->get();
        $dokumen = Dokumen::get();
        return view('Peminjam.Index', compact('peminjam','dokumen'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dokumen = Dokumen::get();
        return view('Peminjam.Create', compact('dokumen'));
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
            'Nomor_akad' => 'required',
            'Tanggal_pinjam' => 'required',
         ]);

        $notif = Peminjam::create([
            'nama' => $request->Nama,
            'dokumen_id' => $request->Nomor_akad,
            'tanggal' => $request->Tanggal_pinjam,
        ]);
       if ($notif) {
           //redirect dengan pesan sukses
           alert()->success('Success', 'JOSSS DATANYA SUDAH MASUK');
           return redirect('/peminjam');
       } else {
           //redirect dengan pesan error
           alert()->error('Gagal', 'GAGAL BRO NDA BISA MASUK Di ulangi lagi');
           return redirect()->back();
       }
        // return request()->all();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Peminjam  $peminjam
     * @return \Illuminate\Http\Response
     */
    public function show(Peminjam $peminjam)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Peminjam  $peminjam
     * @return \Illuminate\Http\Response
     */
    public function edit(Peminjam $peminjam)
    {
        $dokumen = Dokumen::get();
        return view('Peminjam.Edit', compact('peminjam','dokumen'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Peminjam  $peminjam
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $this->validate($request, [
            'nama' => 'required',
            'dokumen_id' => 'required',
            'tanggal' => 'required',
        ]);
        
        $peminjam = Peminjam::find($id);
        $doku =  $request->all();
        $peminjam->update($doku);
        if ($peminjam) {
            //redirect dengan pesan sukses
            Alert::alert('Data Berhasil Diubah', 'success');
            return redirect()->route('peminjam.index');
        } else {
            //redirect dengan pesan error
            return redirect()->route('peminjam.edit')->with(['error' => 'Data Gagal Disimpan!']);
        }
        // return $request->all();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Peminjam  $peminjam
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $peminjam = Peminjam::find($id);
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
