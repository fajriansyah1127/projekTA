<?php

namespace App\Http\Controllers;

use App\Models\Formulir;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Riwayat;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use RealRashid\SweetAlert\Facades\Alert;
use Exception;
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
    public function show($formulir)
    {
        $formulirs= DB::table('formulirs')
        ->where('file','=',$formulir )
        ->first();

        Riwayat::create([
            'user_id' => Auth::user()->id,
            'nama' => Auth::user()->nama,
            'aktivitas' => 'Mengunduh Formulir '.$formulirs->nama
        ]);

        $file_path= public_path()."/formulir/$formulir";

        $headers = array(
            'Content-Type: application/pdf',
          );

          return response()->download($file_path);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Formulir  $formulir
     * @return \Illuminate\Http\Response
     */
    public function edit(Formulir $formulir)
    {
    
        return view('Formulir.Edit', compact('formulir'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Formulir  $formulir
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $this->validate($request, [
            'nama' => 'required',
            'file_formulir' => 'file|mimes:pdf|max:10000'
        ]);
       
        $formulir = Formulir::find($id);
        $doku =  $request->all();
        

        if ($file = $request->file('file_formulir')) {
            File::delete('formulir/'.$formulir->file);  
            $destinationPath = 'formulir/';
            $formulirfile = Request()->nama. '_'.$id.'_'.date('dmy').'.' . $file->extension();
            $file->move($destinationPath, $formulirfile);
            $doku['file'] = "$formulirfile";
        }else{
            unset($doku['file']);
        }

        $formulir->update($doku);
        Riwayat::create([
            'user_id' => Auth::user()->id,
            'nama' => Auth::user()->nama,
            'aktivitas' => 'Mengubah Formulir '.$request->nama.''
        ]);

        if ($formulir) {
            //redirect dengan pesan sukses
            Alert::alert('DATA BERHASIL DIUBAH');
            return redirect()->route('formulirs.index');
        } else {
            //redirect dengan pesan error
            return redirect()->route('formulirs.edit')->with(['error' => 'Data Gagal Disimpan!']);
        }
        //return $request->all();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Formulir  $formulir
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $formulir = Formulir::find($id);
        try {
            $formulir->forceDelete();
            File::delete('formulir/'.$formulir->file);
        } catch (Exception $e){
            Alert::alert('ERROR', 'Dokumen masih dipinjam');
            return redirect()->back();
        }

        Riwayat::create([
            'user_id' => Auth::user()->id,
            'nama' => Auth::user()->nama,
            'aktivitas' => 'Menghapus Formulir '. $formulir->nama.''
        ]);
        Alert::toast('Data Berhasil Dihapus', 'success');
        return redirect()->back();
    }
}
