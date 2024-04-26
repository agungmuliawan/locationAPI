<?php

use App\Http\Controllers\BelajarController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LocationController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [LoginController::class, 'login'])->name('login');
Route::post('actionlogin', [LoginController::class, 'actionlogin'])->name('actionlogin');

Route::get('belajar', [BelajarController::class, 'belajar'])->name('belajar');
Route::post('actioninput', [BelajarController::class, 'actioninput'])->name('actioninput');

Route::get('home', [HomeController::class, 'index'])->name('home')->middleware('auth');
Route::get('actionlogout', [LoginController::class, 'actionlogout'])->name('actionlogout')->middleware('auth');

//Route::get
// Route::get('register', [RegisterController::class, 'register'])->name('register');
// Route::get('register/action', [RegisterController::class, 'actionregister'])->name('actionregister');

Route::get('register', [RegisterController::class, 'register'])->name('register');
Route::post('register/action', [RegisterController::class, 'actionregister'])->name('actionregister');

Route::get('riwayat_kerja', [ProfileController::class, 'riwayat_kerja'])
    ->name('riwayat_kerja');
Route::get('tambah_riwayat_kerja', [ProfileController::class, 'tambah_riwayat_kerja'])
    ->name('tambah_riwayat_kerja');
Route::post('proses_tambah_riwayat_kerja', [ProfileController::class, 'proses_tambah_riwayat_kerja'])
    ->name('proses_tambah_riwayat_kerja');
Route::get('riwayat_kerja/edit/{id_kerja}', [ProfileController::class, 'ubah_riwayat_kerja'])->name('ubah_riwayat_kerja')->middleware('auth');
Route::post('riwayat_kerja/update', [ProfileController::class, 'update_riwayat_kerja'])->name('update_riwayat_kerja')->middleware('auth');
Route::get('riwayat_kerja/delete/{id_kerja}', [ProfileController::class, 'delete_riwayat_kerja'])->name('delete_riwayat_kerja')->middleware('auth');

Route::get('location', [LocationController::class, 'index']);
Route::get('location/kabupaten/{id}', [LocationController::class, 'getKabupaten']);
Route::get('location/kecamatan/{id}', [LocationController::class, 'getKecamatan']);
Route::get('location/kelurahan/{id}', [LocationController::class, 'getKelurahan']);
