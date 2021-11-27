<?php

use App\Http\Controllers\Wisatacontroller;
use App\Http\Controllers\LokasiController;
use App\Http\Controllers\PengunjungController;
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
    Route::resource('wisata', Wisatacontroller::class);
    Route::resource('lokasi', LokasiController::class);
    Route::resource('pengunjung', PengunjungController::class);
});
