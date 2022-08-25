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
    
    Route::get('/login', [LoginController::class,'index'])->name('login')->Middleware('guest');
    
    Route::resource('/', LoginController::class);
});
Route::resource('/login', LoginController::class);


Route::group(['middleware' => 'auth'], function () {
    Route::post('/logout',[AuthenticateController::class,'logout']); 
    Route::get('/index', function () {
        return view('index');
    });
    Route::get('/index2', function () {
        return view('index2');
    });
    Route::resource('/profile', ProfileController::class);
   
    Route::resource('/asuransi', AsuransiController::class)->Middleware('admin');
    Route::resource('/dokumen', DokumenController::class)->Middleware('admin','satpam');
    Route::resource('/user', UserController::class)->Middleware('admin');;
    Route::resource('/produk', ProdukController::class)->Middleware('admin');
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
