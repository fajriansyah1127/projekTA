<?php

namespace App\Http\Controllers;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;
use App\Models\Satuan;
use Illuminate\Http\Request;
use Exception;

class SatuanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $satuan = Satuan::get();
        return view('Satuan.Index', compact('satuan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Satuan.Create');
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
            'nama_satuan' => 'required',
            'jenis_satuan' => 'required',
            'detail_satuan' => 'required',
        ]);

        $notif = Satuan::create([
            'nama' => $request->nama_satuan,
            'jenis' => $request->jenis_satuan,
            'detail' => $request->detail_satuan,
        ]);
        if ($notif) {
            //redirect dengan pesan sukses
            alert()->success('Success', 'JOSSS DATANYA SUDAH MASUK');
            return redirect('/satuan');
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
     * @param  \App\Models\Satuan  $satuan
     * @return \Illuminate\Http\Response
     */
    public function show(Satuan $satuan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Satuan  $satuan
     * @return \Illuminate\Http\Response
     */
    public function edit(Satuan $satuan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Satuan  $satuan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Satuan $satuan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Satuan  $satuan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Satuan $satuan)
    {
        //
    }
}
