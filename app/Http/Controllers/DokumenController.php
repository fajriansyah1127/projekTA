<?php

namespace App\Http\Controllers;
use Exception;
use App\Models\Dokumen;
use App\Models\Asuransi;
use App\Models\Outlet;
use App\Models\Peminjam;
use App\Models\Produk;
use App\Models\Riwayat;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Vinkla\Hashids\Facades\Hashids;
use Response;

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
        ->latest()->get();
        $dokumen = Dokumen::with('user','produk','outlet')->latest()->get();
        return view ('Dokumen.Index', compact('dokumen','DokumenRole'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $dokumen = Produk::with('asuransi')->get();
        $dokumens = Outlet::get();
        return view('Dokumen.Create', compact('dokumen','dokumens'));
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
             'nomor_akad' => 'required|unique:dokumens',
             'outlet_dokumen' => 'required',
             'tanggal_dokumen' => 'required',
             'produk_dokumen' => 'required',
             'file_dokumen' => 'required|file|mimes:pdf|max:100000',
          ]); 

         $file = Request()->file_dokumen;
         $filename = Request()->nama_dokumen . '_'.Request()->nomor_akad.date('dmy').'.' . $file->extension();
         $file->move(public_path('dokumen_klaim'), $filename);

         $notif = Dokumen::create([
             'nama' => $request->nama_dokumen,
             'nomor_akad' => $request->nomor_akad,
             'outlet_id' => $request->outlet_dokumen,
             'tanggal_klaim' => $request->tanggal_dokumen,
             'produk_id' => $request->produk_dokumen,
             'file' => $filename,
             'nama_pengupload' => Auth::user()->nama,
             'user_id' => Auth::user()->id,
         ]);

         Riwayat::create([
            'user_id' => Auth::user()->id,
            'nama' => Auth::user()->nama,
            'aktivitas' => 'Menambah Dokumen Atas Nama '.$request->nama_dokumen.''
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
    public function show($file)
    {
        $Dokumen = DB::table('dokumens')
        ->where('file','=',$file )
        ->first();

        Riwayat::create([
            'user_id' => Auth::user()->id,
            'nama' => Auth::user()->nama,
            'aktivitas' => 'Mengunduh Dokumen Atas Nama '.$Dokumen->nama
        ]);

        $file_path= public_path()."/dokumen_klaim/$file";

        $headers = array(
            'Content-Type: application/pdf',
          );

          return response()->download($file_path);
       
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
        return view('Dokumen.Edit', compact('dokuman','dokumen','outlet'));
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
            'file' => 'file|mimes:pdf|max:100000',
        ]);
       
        
        $decoded_id = Hashids::decode($id);
        $dokumen = Dokumen::find($decoded_id[0]);
        $doku =  $request->all();
        

        if ($file = $request->file('file')) {
            File::delete('dokumen_klaim/'.$dokumen->file);  
            $destinationPath = 'dokumen_klaim/';
            $request->request->add(['user_id' => Auth::user()->id]);
            $dokumenfile = Request()->nama.'_'.Request()->nomor_akad.date('dmy').'.' . $file->extension();
            $file->move($destinationPath, $dokumenfile);
            $doku['file'] = "$dokumenfile";
        }else{
            unset($doku['file']);
        }

        $dokumen->update($doku);
        Riwayat::create([
            'user_id' => Auth::user()->id,
            'nama' => Auth::user()->nama,
            'aktivitas' => 'Mengubah Dokumen Atas Nama '.$request->nama.''
        ]);

        if ($dokumen) {
            //redirect dengan pesan sukses
            Alert::alert('DATA BERHASIL DIUBAH');
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
        // $peminjam = Peminjam::where('dokumen_id', $decoded_id)->get('dokumen_id');
        $dokumen = Dokumen::find($decoded_id[0]);
        
        if(Peminjam::where('dokumen_id', $decoded_id)->exists()){
            Alert::alert('ERROR', 'Dokumen masih dipinjam');
            return redirect()->back();
		}elseif($dokumen){
			$dokumen->delete();
		}else{
			return abort(500);
		}

        // try {
        //     $dokumen->delete();
        // } catch (Exception $e){
        //     Alert::alert('ERROR', 'Dokumen masih dipinjam');
        //     return redirect()->back();
        // }

        Riwayat::create([
            'user_id' => Auth::user()->id,
            'nama' => Auth::user()->nama,
            'aktivitas' => 'Menghapus Dokumen Atas Nama '.$dokumen->nama.''
        ]);
        Alert::toast('Data Berhasil Dihapus', 'success');
        return redirect()->back();
    }

    public function trash()
    {
    	// mengampil data dokumen yang sudah dihapus
    	$dokumen = Dokumen::onlyTrashed()->get();
    	return view('Dokumen.Dokumen_trash', ['dokumen_trash' => $dokumen]);
    }

     // restore data dokumen yang dihapus
    public function kembalikan($id)
    {
        $decoded_id = Hashids::decode($id);
    	$dokumen = Dokumen::onlyTrashed()->where('id',$decoded_id);
    	$dokumen->restore();
        Alert::toast('Data Berhasil Dipulihkan', 'success');
    	return redirect('/sampah');
    }

    // restore semua data dokumen yang sudah dihapus

    // hapus permanen
    public function hapus_permanen($id)
    {
    	// hapus permanen data guru
        $decoded_id = Hashids::decode($id);
        // $dokumen = Dokumen::find($decoded_id[0]);
    	// $dokumen = Dokumen::onlyTrashed()->where('id',$decoded_id);
        $dokumen = Dokumen::onlyTrashed()->find($decoded_id[0]);
        if(Peminjam::where('dokumen_id', $decoded_id)->exists()){
            Alert::alert('ERROR', 'Barang masih dipinjam');
            return redirect()->back();
		}elseif($dokumen){
			$dokumen->forceDelete();
            File::delete('dokumen_klaim/' . $dokumen->file);
		}else{
			return abort(500);
		} 
        // try {
        //     $dokumen->forceDelete();
        //     File::delete('dokumen_klaim/' . $dokumen->file);
        // } catch (Exception $e){
        //     Alert::alert('ERROR', 'Dokumen masih dipinjam');
        //     return redirect()->back();
        // }
        
        Alert::toast('Data Berhasil DiHapus', 'success');
    	return redirect('/sampah');
    }
}
