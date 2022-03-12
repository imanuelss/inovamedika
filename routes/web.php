<?php

use App\Http\Controllers\obatController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\pendaftaranController;
use App\Http\Controllers\pegawaiController;
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

Route::get('home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('pasien', [pendaftaranController::class, 'index']);
Route::resource('pasien', pendaftaranController::class);

Route::get('pegawai', [pegawaiController::class, 'index']);
Route::resource('pegawai', pegawaiController::class);
Route::get('printpdf', [pegawaiController::class, 'printpdf'])->name('printpdf');


Route::get('obat', [obatController::class, 'index']);
Route::resource('obat', obatController::class);