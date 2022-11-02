<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DokumenController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AsuransiController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\AuthenticateController;
use App\Http\Controllers\PeminjamController;
use App\Http\Controllers\PeminjamBarangController;
use App\Http\Controllers\SatuanController;
use App\Http\Controllers\OutletController;
Use App\Http\Controllers\BarangMasukController;
Use App\Http\Controllers\BarangKeluarController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\StokController;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\RiwayatController;
use App\Http\Controllers\FormulirController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/dokm', function () {
//     return view('icip');
// });
Route::get('/forget', function () {
    return view('auth.passwords.email');
});



Route::group(['middleware' => 'guest'], function () {
    Route::post('/auth', [AuthenticateController::class,'authenticate']);
    Route::get('/', [HomeController::class,'index']);
    Auth::routes();
    // Route::resource('/', CariDokumenController::class);
    Route::get('/kontak', [KontakController::class,'index']);

});


Route::group(['middleware' => 'auth'], function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('home');
    Route::post('/logout',[AuthenticateController::class,'logout']); 
    Route::get('/kontak/show', [KontakController::class,'show'])->name('kontak');

    Route::group(['middleware'=> 'hakakses:Admin'],function(){
        Route::resource('/asuransi', AsuransiController::class);
        Route::resource('/user', UserController::class);
        Route::resource('/produk', ProdukController::class);
        Route::resource('/outlet', OutletController::class);
        Route::get('/sampah', [DokumenController::class,'trash'])->name('trash');
        Route::delete('/hapus_permanen/{id}', [DokumenController::class,'hapus_permanen'])->name('hapus_permanen');
        Route::get('/restore/{id}', [DokumenController::class,'kembalikan'])->name('restore');
        Route::resource('/riwayat',RiwayatController::class);
        
    });

    Route::group(['middleware'=> 'hakakses:Admin,Pegawai'],function(){
        Route::resource('/peminjam', PeminjamController::class);
    });

    Route::group(['middleware'=> 'hakakses:Admin,Satpam'],function(){
        Route::resource('/satuan', SatuanController::class);
        Route::resource('/barangmasuk', BarangMasukController::class);
        Route::resource('/barangkeluar', BarangKeluarController::class);
        Route::resource('/stok', StokController::class);
        Route::resource('/peminjambarang', PeminjamBarangController::class);
        Route::get('/cetakstok', [StokController::class,'cetak'])->name('cetak');
        Route::resource('/formulirs',FormulirController::class);
    });

    // Route::group(['middleware'=> 'hakakses:Magang'],function(){
    //     Route::resource('/formulir',FormulirController::class);
    // });

    Route::group(['middleware'=> 'hakakses:Admin,Satpam,Pegawai,Magang'],function(){
        Route::resource('/dokumen', DokumenController::class);
        Route::resource('/profile', ProfileController::class);
        Route::resource('/formulirs',FormulirController::class);
    });    

});

