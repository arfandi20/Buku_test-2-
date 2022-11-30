<?php

use App\Http\Controllers\BukuController;
use App\Http\Controllers\KategoriController;
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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function () {
    Route::resource ('/kategori', KategoriController::class);
    Route::get('deletekategori/{id}', [KategoriController::class, 'destroy'])->name('deletekategori');

    Route::resource ('/buku', BukuController ::class);
    Route::get('deletbuku/{id}', [BukuController::class, 'destroy'])->name('deletbuku');
});

Route::get('beranda', [BukuController::class, 'beranda']);
