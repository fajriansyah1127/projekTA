<?php

namespace App\Http\Controllers;
use App\Models\Stok;
use App\Models\BarangKeluar;
use Exception;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;

class BarangKeluarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stok = stok::get();
        $barangkeluar = BarangKeluar::get();
        return view('BarangKeluar.Index',compact('stok','barangkeluar'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->validate($request, [
            'id' => 'required', //hasil id stok
        ]); 

        $stok = Stok::with('satuan')->where('id', $request->id)->get();
        return view('BarangKeluar.Create', compact('stok'));
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
               'kodebarang_barangkeluar' => 'required',
               'tanggal_barangkeluar' => 'required',
               'nama_barangkeluar' => 'required',
               'jenis_barangkeluar' => 'required',
               'jumlah' => 'required',
               'total_barangkeluar' => 'required',
               'satuan' => 'required',
               'pengambil_barangkeluar' => 'required',

           ]); 

       
        $update = $request->jumlah;  
        Stok::where('id', $request->kodebarang_barangkeluar)->update([
            'jumlah' => $update
        ]);
        
         $notif = BarangKeluar::create([
            'stok_id' => $request->kodebarang_barangkeluar,
            'nama' => $request->nama_barangkeluar,
            'jenis' => $request->jenis_barangkeluar,
            'total_barangkeluar' => $request->total_barangkeluar,
            'satuan' => $request->satuan,
            'pengambil' => $request->pengambil_barangkeluar,
            'tanggal_keluar' => $request->tanggal_barangkeluar,
         ]);


        if ($notif) {
            //redirect dengan pesan sukses
            alert()->success('Success', 'JOSSS DATANYA SUDAH keluar');
            return redirect('/barangkeluar');
        } else {
            //redirect dengan pesan error
            alert()->error('Gagal', 'GAGAL BRO NDA BISA keluar Di ulangi lagi');
            return redirect()->back();
        }
        // return $request->all();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BarangKeluar  $barangKeluar
     * @return \Illuminate\Http\Response
     */
    public function show(BarangKeluar $barangKeluar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BarangKeluar  $barangKeluar
     * @return \Illuminate\Http\Response
     */
    public function edit($barangKeluar)
    {
        $barangkeluar = BarangKeluar::find($barangKeluar);
        // $stok = Stok::with('satuan')->where('id','BAR-0002')->get();
        return view('BarangKeluar.Edit', compact('barangkeluar'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BarangKeluar  $barangKeluar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       
        // $file = Request()->foto_barangkeluar;
        // $filename = Request()->nama_barangkeluar.date('dmy').'.'.$file->extension();
        // $file->move(public_path('foto_barangkeluar'), $filename);


       $notif= BarangKeluar::where('id', $id)->update([
        'stok_id' => $request->kodebarang_barangkeluar,
        'nama' => $request->nama_barangkeluar,
        'jenis' => $request->jenis_barangkeluar,
        'satuan' => $request->satuan,
        'pengambil' => $request->pengambil_barangkeluar,
        'tanggal_keluar' => $request->tanggal_barangkeluar,
        ]);

        if ($notif) {
            //redirect dengan pesan sukses
            Alert::alert('Data Berhasil Diubah', 'success');
            return redirect()->route('barangkeluar.index');
        } else {
            //redirect dengan pesan error
            return redirect()->route('barangkeluar.edit')->with(['error' => 'Data Gagal Disimpan!']);
        }
       // return $request->all();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BarangKeluar  $barangKeluar
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $barangkeluar = BarangKeluar::find($id);
        try {
            $barangkeluar->delete();
        } catch (Exception $e){
            Alert::alert('ERROR', 'masih dipinjam');
            return redirect()->back();
        }

        Alert::toast('Data Berhasil Dihapus', 'success');
        return redirect()->back();
    }
    
}
