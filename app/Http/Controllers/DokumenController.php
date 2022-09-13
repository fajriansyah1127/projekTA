<?php

namespace App\Http\Controllers;
use Exception;
use App\Models\Dokumen;
use App\Models\Asuransi;
use App\Models\Outlet;
use App\Models\Produk;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Vinkla\Hashids\Facades\Hashids;

class DokumenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Dokumen $dokumen)
    {
        $DokumenRole = Dokumen::with('user','produk','outlet')
        ->where('user_id', Auth::user()->id)
        ->get();
        $dokumen = Dokumen::with('user','produk','outlet')->get();
        return view ('Dokumen.Index', compact('dokumen','DokumenRole'));
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
        $dokumen = Produk::with('asuransi')->get();
        $dokumens = Outlet::get();
        return view('Dokumen.create', compact('dokumen','dokumens'));
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
             'nama_dokumen' => 'required',
             'nomor_dokumen' => 'required',
             'outlet_dokumen' => 'required',
             'tanggal_dokumen' => 'required',
             'produk_dokumen' => 'required',
             'file_dokumen' => 'required|mimes:pdf|max:10000',

          ]); 
         $file = Request()->file_dokumen;
         $filename = Request()->nama_dokumen . '_'.Request()->nomor_dokumen.date('dmy').'.' . $file->extension();
         $file->move(public_path('filearsip'), $filename);

         $notif = Dokumen::create([
             'nama' => $request->nama_dokumen,
             'nomor_akad' => $request->nomor_dokumen,
             'outlet_id' => $request->outlet_dokumen,
             'tanggal_klaim' => $request->tanggal_dokumen,
             'produk_id' => $request->produk_dokumen,
             'file' => $filename,
             'nama_pengupload' => Auth::user()->nama,
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
         //return request()->all();
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
    // public function edit(Dokumen $dokuman)
    // {
    //     $dokuman =
    //     $dokumen = Produk::with('asuransi')->get();
    //     $outlet = Outlet::get();
    //     return view('Dokumen.edit', compact('dokuman','dokumen','outlet'));
    // }
    public function edit($dokuman)
    {  
        try {
            $decoded_id = Hashids::decode($dokuman);
            $dokuman = Dokumen::find($decoded_id[0]);
        } catch (Exception $e){
            abort(404);
        }
        $dokumen = Produk::with('asuransi')->get();
        $outlet = Outlet::get();
        return view('Dokumen.edit', compact('dokuman','dokumen','outlet'));
    }
    // public function editmagang(Dokumen $magang)
    // {
        
    //     $dokumen = Produk::with('asuransi')->get();
    //     $outlet = Outlet::get();
    //     return view('Dokumen.edit', compact('dokuman','dokumen','outlet'));
    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $this->validate($request, [
            'nama' => 'required',
            'nomor_akad' => 'required',
            'outlet_id' => 'required',
            'tanggal_klaim' => 'required',
            'produk_id' => 'required',
            'file' => 'file|mimes:pdf|max:10000',
        ]);
       
        
        $decoded_id = Hashids::decode($id);
        $dokumen = Dokumen::find($decoded_id[0]);
        $doku =  $request->all();
        

        if ($file = $request->file('file')) {
            File::delete('filearsip/'.$dokumen->file);  
            $destinationPath = 'filearsip/';
            $request->request->add(['user_id' => Auth::user()->id]);
            $dokumenfile = Request()->nama.'_'.Request()->nomor_surat.date('dmy').'.' . $file->extension();
            $file->move($destinationPath, $dokumenfile);
            $doku['file'] = "$dokumenfile";
        }else{
            unset($doku['file']);
        }

        $dokumen->update($doku);

        if ($dokumen) {
            //redirect dengan pesan sukses
            Alert::alert('Data Berhasil Diubah', 'success');
            return redirect()->route('dokumen.index');
        } else {
            //redirect dengan pesan error
            return redirect()->route('Dokumen.edit')->with(['error' => 'Data Gagal Disimpan!']);
        }
        //return $request->all();
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $decoded_id = Hashids::decode($id);
        $dokumen = Dokumen::find($decoded_id[0]);
        try {
            $dokumen->delete();
            File::delete('filearsip/' . $dokumen->file);
        } catch (Exception $e){
            Alert::alert('ERROR', 'Dokumen masih dipinjam');
            return redirect()->back();
        }

        Alert::toast('Data Berhasil Dihapus', 'success');
        return redirect()->back();
        // $user->delete();
        // File::delete('foto/' . $user->foto);
        // Alert::alert('Data Berhasil DiHAPUS', 'success');
        // return redirect()->back();
    }
}
