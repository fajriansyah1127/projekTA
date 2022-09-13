<?php

namespace App\Http\Controllers;
use Exception;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Stok;
use Illuminate\Http\Request;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class StokController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Stok $stok)
    {
        $stok = Stok::get();
        return view('Stok.Index', compact('stok'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Stok.Create');
        
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
            'nama_barang' => 'required',
            'jenis_barang' => 'required|email:dns',
            'jumlah' => 'required',
            'satuan' => 'required',
        ]);

        $id = IdGenerator::generate(['table' => 'stok', 'length' => 8, 'prefix' =>'BAR-']);

        $notif = Stok::create([
            'id' => $id,
            'nama_barang' => $request->nama_barang,
            'jenis_barang' => $request->jenis_barang,
            'jumlah' => $request->jumlah,
            'satuan' => $request->satuan,
        ]);
       
        if($notif){
            //redirect dengan pesan sukses
            alert()->success('Success', 'JOSSS DATANYA SUDAH MASUK');
            return redirect('/stok');
        }else{
            //redirect dengan pesan error
            return redirect()->route('Stok.Index')->with(['error' => 'Data Gagal Disimpan!']);
        }
       
        //return $request->all();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Asuransi  $asuransi
     * @return \Illuminate\Http\Response
     */
    public function show(Stok $asuransi)
    {
        return view('Asuransi.Show', compact('asuransi'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Asuransi  $asuransi
     * @return \Illuminate\Http\Response
     */
    public function edit(Stok $asuransi)
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
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nama' => 'required',
            'email' => 'required|email:dns',
            'kontak' => 'required',
            'alamat' => 'required',
            'status' => 'required',
        ]); 
        $asuransi = Stok::find($id);
        $inter = $request->all();  
        $asuransi->update($inter);
        
        if($asuransi){
            //redirect dengan pesan sukses
            alert()->success('Success', 'JOSSS DATANYA BERHASIL TERUBAH');
            return redirect('/asuransi');
        }else{
            //redirect dengan pesan error
            return redirect()->route('asuransi.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Asuransi  $asuransi
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $asuransi->delete();
        // Alert::alert('Data Berhasil DiHAPUS', 'success');
        // return redirect()->back();
        $asuransi = Stok::find($id);
        try {
            $asuransi->delete();
        } catch (Exception $e){
            alert()->error('ERROR', 'Asuransi Terdapat Pada Produk Atau Dokumen');
            return redirect()->back();
        }

        Alert::toast('Data Berhasil Dihapus', 'success');
        return redirect()->back();
    }
}
