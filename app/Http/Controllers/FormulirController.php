<?php

namespace App\Http\Controllers;

use App\Models\Formulir;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class FormulirController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $formulir = DB::table('formulirs')->get();
        return view ('Formulir.Index', compact('formulir'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('Formulir.Create');
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
            'nama_formulir' => 'required',
            'file_formulir' => 'required|file|mimes:pdf|max:10000'

         ]); 
        $file = Request()->file_formulir;
        $filename = Request()->nama_formulir . '_'.Request()->id.date('dmy').'.' . $file->extension();
        $file->move(public_path('formulir'), $filename);

        $notif = Formulir::create([
            'nama' => $request->nama_formulir,
            'file' => $filename,
        ]);

       if ($notif) {
           //redirect dengan pesan sukses
           alert()->success('Success', 'JOSSS DATANYA SUDAH MASUK');
           return redirect('/formulirs');
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
     * @param  \App\Models\Formulir  $formulir
     * @return \Illuminate\Http\Response
     */
    public function show(Formulir $formulir)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Formulir  $formulir
     * @return \Illuminate\Http\Response
     */
    public function edit(Formulir $formulir)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Formulir  $formulir
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Formulir $formulir)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Formulir  $formulir
     * @return \Illuminate\Http\Response
     */
    public function destroy(Formulir $formulir)
    {
        //
    }
}
