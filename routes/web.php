<?php

use App\Http\Controllers\BukuController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\JurnalController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\PinjamanController;
use App\Http\Controllers\DetailtransaksiController;
use App\Http\Controllers\KategoriController;
use App\Models\BukuModel;
use App\Models\DetailtransaksiModel;
use App\Models\transaksi;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('layout.main');
});


route::group(['prefix' => 'admin', 'middleware' => ['auth'], 'as' => 'admin.'], function () {


    // halaman utama 
    route::get('home', [HomeController::class, 'index'])->name('homapage');

    // route::get('dashboard', [HomeController::class, 'dashboard'])->name('dashboard');
    // route::get('/user', [HomeController::class, 'index'])->name('index.user');
    route::get('user', [UserController::class,'index'])->name('user');
    route::get('/user/tambah', [UserController::class, 'tambah'])->name('tambah');
    route::post('/user/submit', [UserController::class, 'submit'])->name('submit');
    route::get('/user/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
    route::post('/user/update/{id}', [UserController::class, 'update'])->name('user.update');
    route::post('/user/delete/{id}', [UserController::class, 'delete'])->name('user.delete');


    route::get('jurnal', [JurnalController::class, 'index'])->name('jurnal');
    route::post('/jurnal/store', [JurnalController::class, 'store'])->name('jurnal.store');
    route::post('/jurnal/update/{id}', [JurnalController::class, 'update'])->name('jurnal.update');
    route::post('/jurnal/delete/{id}', [JurnalController::class, 'delete'])->name('jurnal.delete');
    Route::get('/jurnal/show/{id}', [JurnalController::class, 'show'])->name('jurnal.show');



    route::get('/buku', [BukuController::class, 'index'])->name('buku');
    route::post('/buku/store', [BukuController::class, 'store'])->name('store');
    route::post('/buku/update/{id}', [BukuController::class, 'update'])->name('buku.update');
    route::post('/buku/delete/{id}', [BukuController::class, 'delete'])->name('buku.delete');
    
    route::get('/kategori', [KategoriController::class, 'index'])->name('kategori');
    route::post('/kategori/store', [KategoriController::class, 'store'])->name('kategori.store');
    route::post('/kategori/update/{id}', [KategoriController::class, 'update'])->name('kategori.update');
    route::post('/kategori/delete/{id}', [KategoriController::class, 'delete'])->name('kategori.delete');



    Route::get('/transaksi', [TransaksiController::class, 'index'])->name('transaksi');
    Route::post('/transaksi/add/{id}', [TransaksiController::class, 'addtransaksi'])->name('transaksi.add');

    Route::get('/detailtransaksi', [DetailtransaksiController::class, 'index'])->name('cek');

    route::get('/pinjam',[PinjamanController::class, 'ngehek'])->name('pinjaman');


    route::get('/transaksi/anyar', [transaksiController::class, 'anyar'])->name('anyar');
    route::post('/transaksi/store', [transaksiController::class, 'store'])->name('transaksi.store');








    // export file
    route::get('/buku/export', [BukuController::class, 'export'])->name('buku.export');
    // route::get('/buku/hilirisasi', [BukuController::class, 'hilirisasi'])->name('buku.hilir');
    // export detail transaksi 
    route::get('/detailtransaksi/expor', [DetailtransaksiController::class, 'expor'])->name('detail.expor');

});



route::get('/login', [LoginController::class, 'index'])->name('login');
route::post('/login-proses', [LoginController::class, 'login_proses'])->name('login-proses');
route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/register', [LoginController::class, 'register'])->name('register');

// Route::get('/get-modal-content', function () {
//     $content = "Ini adalah konten yang diambil dari halaman lain.";
//     return view('dashboard', compact('content'));
// });
