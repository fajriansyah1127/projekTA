<?php

namespace App\Http\Controllers;

use App\Models\BarangMasuk;
use App\Models\Satuan;
use App\Models\Stok;
use Exception;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use App\Models\Riwayat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\ModelNotFoundException;
class BarangMasukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stok = stok::get();
        $barangmasuk = BarangMasuk::with('stok')->latest()->get();
        $satuan = Satuan::get();
        return view('BarangMasuk.Index',compact('stok','barangmasuk','satuan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request )
    {
        $this->validate($request, [
            'id' => 'required', //hasil id stok
        ]); 

        $stok = Stok::with('satuan')->where('id', $request->id)->get();
        return view('BarangMasuk.Create', compact('stok'));

        //  return view('BarangMasuk.Create', compact('stok'));

         return $request;
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
            'kodebarang_barangmasuk' => 'required',
            'tanggal_barangmasuk' => 'required',
            'nama_barangmasuk' => 'required',
            'jenis_barangmasuk' => 'required',
            'jumlah' => 'required',
            'total_barangmasuk' => 'required',
            'satuan' => 'required',
            'penerima_barangmasuk' => 'required',
            'foto_barangmasuk' => 'required|file|image|mimes:jpg,jpeg,bmp,png|max:10000',
        ]); 

       
        $update = $request->jumlah;  
        Stok::where('id', $request->kodebarang_barangmasuk)->update([
            'jumlah' => $update
        ]);
        
        $file = Request()->foto_barangmasuk;
        $filename = Request()->nama_barangmasuk.date('his').'.'.$file->extension();
        $file->move(public_path('foto_barangmasuk'), $filename);
       
         $notif = BarangMasuk::create([
            'stok_id' => $request->kodebarang_barangmasuk,
            'nama' => $request->nama_barangmasuk,
            'jenis' => $request->jenis_barangmasuk,
            'total_barangmasuk' => $request->total_barangmasuk,
            'satuan' => $request->satuan,
            'penerima' => $request->penerima_barangmasuk,
            'tanggal_masuk' => $request->tanggal_barangmasuk,
            'foto' => $filename,
         ]);
         

         Riwayat::create([
            'user_id' => Auth::user()->id,
            'nama' => Auth::user()->nama,
            'aktivitas' => 'Menambah Data Barang Masuk  '.$request->nama.''
        ]);


        if ($notif) {
            //redirect dengan pesan sukses
            alert()->success('Success', 'JOSSS DATANYA SUDAH MASUK');
            return redirect('/barangmasuk');
        } else {
            //redirect dengan pesan error
            alert()->error('Gagal', 'GAGAL BRO NDA BISA MASUK Di ulangi lagi');
            return redirect()->back();
        }
         //return $request->all();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BarangMasuk  $barangMasuk
     * @return \Illuminate\Http\Response
     */
    public function show(Stok $stok)
    {
        $stok = Stok::with('satuan')->where('nama_barang', $stok)->get();
        return view('BarangMasuk.Create', compact('stok'));
        //return $request->all();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BarangMasuk  $barangMasuk
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $barangmasuk = BarangMasuk::findOrfail($id); 
        try {
               $barangmasuk->stok->jumlah;
        } catch (Exception $e){
            Alert::alert('ERROR', 'Stok Sudah Di Hapus');
            return redirect()->route('barangmasuk.index');
        }
        $stok = Stok::get();
        return view('BarangMasuk.Edit', compact('barangmasuk','stok'));
    }

    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BarangMasuk  $barangMasuk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       
        // $file = Request()->foto_barangmasuk;
        // $filename = Request()->nama_barangmasuk.date('dmy').'.'.$file->extension();
        // $file->move(public_path('foto_barangmasuk'), $filename);

        $this->validate($request, [
            'stok_id' => 'required',
            'tanggal_barangmasuk' => 'nullable',
            'nama' => 'nullable',
            'jenis' => 'nullable',
            'total_barangmasuk' => 'nullable',
            'jumlah' =>'required',
            'satuan' => 'nullable',
            'penerima' => 'nullable',
            'foto' => 'nullable|file|image|mimes:jpg,jpeg,bmp,png|max:10000',
        ]); 

        $barangmasuk = BarangMasuk::find($id);
        $inter = $request->all(); 

        if ($file = $request->file('foto')) {
            File::delete('foto_barangmasuk/' . $barangmasuk->foto);
            $destinationPath = 'foto_barangmasuk/';
            $filename = Request()->nama.date('his').'.'.$file->extension();
            $file->move($destinationPath, $filename);
            $inter['foto'] = "$filename";
        } 
        $barangmasuk->update($inter);

        $update = $request->jumlah;  
        Stok::where('id', $request->stok_id)->update([
            'jumlah' => $update
        ]);

        Riwayat::create([
            'user_id' => Auth::user()->id,
            'nama' => Auth::user()->nama,
            'aktivitas' => 'Mengubah Data Barang Masuk  '.$request->nama.''
        ]);
        if ($barangmasuk) {
            //redirect dengan pesan sukses
            Alert::alert('DATA BERHASIL DIUBAH');
            return redirect()->route('barangmasuk.index');
        } else {
            //redirect dengan pesan error
            return redirect()->route('barangmasuk.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
        //return request()->all();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BarangMasuk  $barangMasuk
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $barangMasuk = BarangMasuk::find($id);
        try {
            $barangMasuk->delete();
            File::delete('foto_barangmasuk/' . $barangMasuk->foto);
        } catch (Exception $e){
            Alert::alert('ERROR', 'masih dipinjam');
            return redirect()->back();
        }

        Riwayat::create([
            'user_id' => Auth::user()->id,
            'nama' => Auth::user()->nama,
            'aktivitas' => 'Menghapus Data Barang Masuk  '.$barangMasuk->nama.''
        ]);
        Alert::toast('Data Berhasil Dihapus', 'success');
        return redirect()->back();
    }
}
