<?php

use App\Http\Controllers\BukuController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\JurnalController;
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

Route::get('/', function ()  {
    return view('layout.main');
});


route::group(['prefix'=>'admin','middleware' => ['auth'], 'as' => 'admin.'] ,function(){

    route::get('dashboard',[HomeController::class,'dashboard'])->name('dashboard');
    route::get('/user',[HomeController::class,'index'])->name('index.user');
    route::get('/user/tambah',[UserController::class,'tambah'])->name('tambah');
    route::post('/user/submit',[UserController::class,'submit'])->name('submit');
    route::get('/user/edit/{id}',[UserController::class,'edit'])->name('user.edit');
    route::post('/user/update/{id}',[UserController::class,'update'])->name('user.update');
    route::post('/user/delete/{id}',[UserController::class,'delete'])->name('user.delete');
    route::get('/buku',[BukuController::class,'index'])->name('buku');
    route::get('jurnal',[JurnalController::class,'index'])->name('jurnal');
    // route::get('/buku/create',[BukuController::class,'create'])->name('create');
    route::post('/buku/store',[BukuController::class,'store'])->name('store');
    route::post('/buku/update/{id}',[BukuController::class,'update'])->name('buku.update');
});



route::get('/login',[LoginController::class,'index'])->name('login');
route::post('/login-proses',[LoginController::class,'login_proses'])->name('login-proses');
route::get('/logout',[LoginController::class,'logout'])->name('logout');
Route::get('/register',[LoginController::class,'register'])->name('register');