<?php

namespace App\Http\Controllers;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;
use App\Models\Asuransi;
use App\Models\Produk;
use Illuminate\Http\Request;


class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Produk $produk)
    {
        $produk = Produk::with('asuransi')->paginate();
        return view('Produk.Index', compact('produk'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $asuransi = Asuransi::get();
        //$dokumen = Dokumen::with('asuransi')->paginate(5);
        // $dokumen = Dokumen::get();
        return view('Produk.create', compact('asuransi'));
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
            'Asuransi' => 'required',
        ]);

        $notif = Produk::create([
            'nama' => $request->Nama,
            'asuransi_id' => $request->Asuransi,
            'user_id' => Auth::user()->id,
            
        ]);


        if ($notif) {
            //redirect dengan pesan sukses
            alert()->success('Success', 'JOSSS DATANYA SUDAH MASUK');
            return redirect('/produk');
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
    public function edit(Produk $produk)
    {
        $asuransi = Asuransi::get();
        return view('Produk.edit', compact('produk','asuransi'));
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
        $this->validate($request, [
            'Nama' => 'required',
            'Asuransi' => 'required',
        ]);
        // return $request->all();
        $data =([
            'nama' => $request->Nama,
            'asuransi_id' => $request->Asuransi,
            'user_id' => Auth::user()->id,
        ]);
        
        $produk = Produk::find($id);
        $produk->update($data);

        if ($produk) {
            //redirect dengan pesan sukses
            Alert::alert('Data Berhasil Diubah', 'success');
            return redirect()->route('produk.index');
        } else {
            //redirect dengan pesan error
            return redirect()->route('produk.edit')->with(['error' => 'Data Gagal Disimpan!']);
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
        // $produk->delete();
        // Alert::alert('Data Berhasil DiHAPUS', 'success');
        // return redirect()->back();
        $produk = Produk::find($id);
       $produk->delete();
        Alert::alert('Data Berhasil DiHAPUS', 'success');
        return redirect()->back();
    }
}
