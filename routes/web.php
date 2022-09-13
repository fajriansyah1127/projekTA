<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DokumenController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AsuransiController;
use App\Http\Controllers\IcipController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\AuthenticateController;
use App\Http\Controllers\PeminjamController;
use App\Http\Controllers\SatuanController;
use App\Http\Controllers\OutletController;
Use App\Http\Controllers\BarangMasukController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\StokController;
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
//Route::get('/', [LoginController::class,'index'])->name('login');

Route::group(['middleware' => 'guest'], function () {
    Route::post('/auth', [AuthenticateController::class,'authenticate']);
    // Route::get('/', function () {
    //     return view('home');
    // });
    Route::get('/login', [LoginController::class,'index'])->name('login');
    Route::resource('/', LoginController::class);
});
Route::resource('/login', LoginController::class);


Route::group(['middleware' => 'auth'], function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('home');
    Route::post('/logout',[AuthenticateController::class,'logout']); 
    
    // Route::get('/index', function () {
    //     return view('index');
    // });
    // Route::get('/index2', function () {
    //     return view('index2');
    // });
    
    // Route::resource('/dokumen', DokumenController::class)->middleware('satpam','admin');
    // Route::resource('/dokumen', DokumenController::class)->middleware('admin');

    Route::group(['middleware'=> 'hakakses:Admin'],function(){
        Route::resource('/asuransi', AsuransiController::class);
        Route::resource('/user', UserController::class);
        Route::resource('/produk', ProdukController::class);
        Route::resource('/outlet', OutletController::class);
    });

    Route::group(['middleware'=> 'hakakses:Admin,Pegawai'],function(){
        Route::resource('/peminjam', PeminjamController::class);
    });

    Route::group(['middleware'=> 'hakakses:Admin,Satpam'],function(){
        Route::resource('/satuan', SatuanController::class);
        Route::resource('/barangmasuk', BarangMasukController::class);
        Route::resource('/barangkeluar', BarangMasukController::class);
        Route::resource('/stok', StokController::class);
    });

    Route::group(['middleware'=> 'hakakses:Admin,Satpam,Pegawai,Magang'],function(){
      
        Route::resource('/dokumen', DokumenController::class);
        Route::resource('/profile', ProfileController::class);
        // Route::resource('/riwayat', RiwayatController::class);
    });

    // Route::group(['middleware'=> 'hakakses:Magang'],function(){
    //     Route::resource('/dokumen', DokumenController::class);
    // });

    // Route::group(['middleware'=> 'hakakses:Satpam'],function(){
    //     Route::resource('/dokumen', DokumenController::class);
    //     Route::resource('/profile', ProfileController::class);
    //     Route::resource('/barangmasuk', BarangMasukController::class);
    //     Route::resource('/dokumen', DokumenController::class);
    //     Route::resource('/satuan', SatuanController::class);
    // });

    // Route::group(['middleware'=> 'hakakses:Pegawai'],function(){
    //     Route::resource('/profile', ProfileController::class);
    //     // Route::resource('/asuransi', AsuransiController::class);
    //     Route::resource('/dokumen', DokumenController::class);
    //     // Route::resource('/user', UserController::class);
    //     Route::resource('/produk', ProdukController::class);
    //     Route::resource('/peminjam', PeminjamController::class);
    //     Route::resource('/outlet', OutletController::class);
    //     Route::resource('/satuan', SatuanController::class);
    //     // Route::resource('/barangmasuk', BarangMasukController::class);
    // });
    
});
Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
