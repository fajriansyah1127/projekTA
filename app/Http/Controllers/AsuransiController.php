<?php

namespace App\Http\Controllers;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Asuransi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AsuransiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Asuransi $asuransi)
    {
        $asuransi = Asuransi::get();
        return view('Asuransi.Index', compact('asuransi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Asuransi.Create');
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
            'Email' => 'required|email:dns|unique:asuransis',
            'Kontak' => 'required',
            'Alamat' => 'required',
            'Status' => 'required',
        ]);

        $notif = Asuransi::create([
            'nama' => $request->Nama,
            'email' => $request->Email,
            'kontak' => $request->Kontak,
            'alamat' => $request->Alamat,
            'status' => $request->Status,
        ]);


        if ($notif) {
            //redirect dengan pesan sukses
            alert()->success('Success', 'JOSSS DATANYA SUDAH MASUK');
            return redirect('/asuransi');
        } else {
            //redirect dengan pesan error
            alert()->error('Gagal', 'GAGAL BRO NDA BISA MASUK Di ulangi lagi');
            return redirect()->back();
        }
        // return $request->all();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Asuransi  $asuransi
     * @return \Illuminate\Http\Response
     */
    public function show(Asuransi $asuransi)
    {
        return view('Asuransi.Show', compact('asuransi'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Asuransi  $asuransi
     * @return \Illuminate\Http\Response
     */
    public function edit(Asuransi $asuransi)
    {
        return view('Asuransi.Edit', compact('asuransi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Asuransi  $asuransi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Asuransi $asuransi)
    {
        $this->validate($request, [
            'nama' => 'required',
            'email' => 'required|email:dns',
            'kontak' => 'required',
            'alamat' => 'required',
            'status' => 'required',
        ]); 
        $inter = $request->all();  
        $asuransi->update($inter);
        if ($asuransi) {
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
     * @param  \App\Models\Asuransi  $asuransi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Asuransi $asuransi)
    {
        $asuransi->delete();
        Alert::alert('Data Berhasil DiHAPUS', 'success');
        return redirect()->back();
    }
}
