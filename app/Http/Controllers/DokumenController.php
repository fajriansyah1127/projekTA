<?php

namespace App\Http\Controllers;

use App\Models\Dokumen;
use App\Models\Asuransi;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class DokumenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Dokumen $dokumen)
    {
        $dokumen = Dokumen::with('asuransi','user')->paginate();
        return view('Dokumen.Index', compact('dokumen'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        // Riwayat::create([
        //     'nama' => Auth::user()->name,
        //     'aktivitas' => 'Menambah Dokumen',
        // ]);
        $dokumen = Asuransi::get();
        //$dokumen = Dokumen::with('asuransi')->paginate(5);
        // $dokumen = Dokumen::get();
        return view('Dokumen.create', compact('dokumen'));
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
             'Nomor' => 'required',
             'Tanggal' => 'required',
             'Produk' => 'required',
             'Tanggal' => 'required',
             'Asuransi' => 'required',
             'File' => 'required|mimes:pdf|max:10000',

         ]);
        //  $request['Password'] = hash::make($request['Password']); 
         $file = Request()->File;
         $filename = Request()->Nama . '_'.Request()->Nomor.date('dmy').'.' . $file->extension();
         $file->move(public_path('filearsip'), $filename);

         $notif = Dokumen::create([
             'nama' => $request->Nama,
             'nomor_surat' => $request->Nomor,
             'tanggal_surat' => $request->Tanggal,
             'produk' => $request->Produk,
             'asuransi_id' => $request->Asuransi,
             'file' => $filename,
             'user_id' => Auth::user()->id,
         ]);


        if ($notif) {
            //redirect dengan pesan sukses
            alert()->success('Success', 'JOSSS DATANYA SUDAH MASUK');
            return redirect('/dokumen');
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Dokumen $dokumen)
    {
        $dokumen = Dokumen::with('asuransi','user')->paginate();
        return view('Dokumen.Show', compact('dokumen'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Dokumen $dokuman)
    {
        $asuransi = Asuransi::get();
        return view('Dokumen.edit', compact('dokuman','asuransi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Dokumen $dokumen)
    {
        $this->validate($request, [
            'Nama' => 'required',
            'Nomor' => 'required',
            'Tanggal' => 'required',
            'Produk' => 'required',
            'Tanggal' => 'required',
            'Asuransi' => 'required',
            'File' => 'required|mimes:pdf|max:10000',

        ]);
        $data = $request->all();  
        $dokumen->update($data);
        if ($dokumen) {
            //redirect dengan pesan sukses
            Alert::alert('Data Berhasil Diubah', 'success');
            return redirect()->route('asuransi.index');
        } else {
            //redirect dengan pesan error
            return redirect()->route('asuransi.edit')->with(['error' => 'Data Gagal Disimpan!']);
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
