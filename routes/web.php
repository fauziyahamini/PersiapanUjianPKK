<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\DashboardController;

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



Route::get('/', [BerandaController::class, 'index']);

// Route::middleware(['auth'])->group(function () {
    Route::resource('dashboard', DashboardController::class);

    //routing halaman artikel
    Route::resource('artikel',ArtikelController::class);
    Route::get('artikel/delete/{id}', [ArtikelController::class, 'destroy']);

    // routing halaman kategori
    Route::resource('kategori',KategoriController::class);
    Route::get('kategori/delete/{id}', [KategoriController::class, 'destroy']);

    Route::resource('user',UserController::class);
    Route::get('user/delete/{id}', [UserController::class, 'destroy']);

    
// });

// Route::middleware(['auth', 'Admin'])->group(function () {
    // routing halaman user
//     

  
// });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
