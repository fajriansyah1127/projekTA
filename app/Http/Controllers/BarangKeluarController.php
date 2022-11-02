<?php

namespace App\Http\Controllers;
use App\Models\Stok;
use App\Models\BarangKeluar;
use Exception;
use Illuminate\Support\Facades\File;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Riwayat;

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
        $barangkeluar = BarangKeluar::latest()->paginate(100);
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
               'foto_barangkeluar' => 'required|file|image|mimes:jpg,jpeg,bmp,png|max:10000',

           ]); 

       
        $update = $request->jumlah;  
        Stok::where('id', $request->kodebarang_barangkeluar)->update([
            'jumlah' => $update
        ]);

        $file = Request()->foto_barangkeluar;
        $filename = Request()->nama_barangkeluar.date('his').'.'.$file->extension();
        $file->move(public_path('foto_barangkeluar'), $filename);
        
         $notif = BarangKeluar::create([
            'stok_id' => $request->kodebarang_barangkeluar,
            'nama' => $request->nama_barangkeluar,
            'jenis' => $request->jenis_barangkeluar,
            'total_barangkeluar' => $request->total_barangkeluar,
            'satuan' => $request->satuan,
            'pengambil' => $request->pengambil_barangkeluar,
            'tanggal_keluar' => $request->tanggal_barangkeluar,
            'foto' => $filename,
         ]);

         Riwayat::create([
            'user_id' => Auth::user()->id,
            'nama' => Auth::user()->nama,
            'aktivitas' => 'Menambah Data Barang Keluar  '.$request->nama.''
        ]);

        if ($notif) {
            //redirect dengan pesan sukses
            alert()->success('Success', 'JOSSS DATANYA SUDAH MASUK');
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
    public function edit($id)
    {
        $barangkeluar = BarangKeluar::findOrfail($id); 
        try {
               $barangkeluar->stok->jumlah;
        } catch (Exception $e){
            Alert::alert('ERROR', 'Stok Sudah Di Hapus');
            return redirect()->route('barangkeluar.index');
        }
        $stok = Stok::get();
        return view('BarangKeluar.Edit', compact('barangkeluar','stok'));
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
       
        $this->validate($request, [
            'stok_id' => 'required',
            'tanggal_barangmasuk' => 'nullable',
            'nama_barangkeluar' => 'nullable',
            'jenis_barangkeluar' => 'nullable',
            'satuan' => 'nullable',
            'pengambil_barangkeluar' => 'nullable',
            'foto' => 'nullable|file|image|mimes:jpg,jpeg,bmp,png|max:10000',
        ]);

        $barangkeluar = BarangKeluar::find($id);

        $inter = $request->all(); 

        if ($file = $request->file('foto')) {
            File::delete('foto_barangkeluar/' . $barangkeluar->foto);
            $destinationPath = 'foto_barangkeluar/';
            $filename = Request()->nama.date('his').'.'.$file->extension();
            $file->move($destinationPath, $filename);
            $inter['foto'] = "$filename";
        } 
        $barangkeluar->update($inter);

        Riwayat::create([
            'user_id' => Auth::user()->id,
            'nama' => Auth::user()->nama,
            'aktivitas' => 'Mengubah Data Barang Keluar  '.$request->nama.''
        ]);

        if ($barangkeluar) {
            //redirect dengan pesan sukses
            Alert::alert('DATA BERHASIL DIUBAH');
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

        Riwayat::create([
            'user_id' => Auth::user()->id,
            'nama' => Auth::user()->nama,
            'aktivitas' => 'Menghapus Data Barang Keluar  '.$barangkeluar->nama.''
        ]);

        Alert::toast('Data Berhasil Dihapus', 'success');
        return redirect()->back();
    }
    
}
