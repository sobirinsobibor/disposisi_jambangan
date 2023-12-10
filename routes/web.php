<?php

use App\Http\Controllers\AuthentikasiController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SuratKeluarController;
use App\Http\Controllers\SuratMasukController;
use Illuminate\Support\Facades\Route;

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

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');
Route::get('/tambahpegawai', [DashboardController::class, 'addpegawai'])->middleware('admin');
Route::post('/tambahpegawai', [DashboardController::class, 'postpegawai'])->middleware('admin');

Route::get('/', [AuthentikasiController::class, 'login'])->name('login')->middleware('guest');
Route::post('/login', [AuthentikasiController::class, 'postlogin'])->middleware('guest');
Route::post('/logout', [AuthentikasiController::class, 'logout'])->middleware('auth');

Route::get('/tambahsuratmasuk', [SuratMasukController::class, 'create'])->middleware('operator');
Route::get('/suratmasuk', [SuratMasukController::class, 'index'])->middleware('kasikasubag');
Route::get('/smsudahdibaca/{id_dsm}', [SuratMasukController::class, 'smsudahdibaca'])->middleware('kasikasubag');
Route::get('/datasuratmasuk', [SuratMasukController::class, 'list'])->middleware('operator');
Route::get('/validasisuratmasuk', [SuratMasukController::class, 'SMcamat'])->middleware('camat');
Route::get('/suratmasuksekcam', [SuratMasukController::class, 'SMsekcam'])->middleware('sekcam');
Route::get('/daftarsuratmasuk', [SuratMasukController::class, 'listSMcamat'])->middleware('camat');
Route::get('/daftarsuratmasuksekcam', [SuratMasukController::class, 'listSMsekcam'])->middleware('sekcam');

Route::post('/tambahsuratmasuk', [SuratMasukController::class, 'store'])->middleware('operator');
Route::post('/validasisuratmasukcamat', [SuratMasukController::class, 'validasiSMcamat'])->middleware('camat');
Route::post('/validasisuratmasuksekcam', [SuratMasukController::class, 'validasiSMsekcam'])->middleware('sekcam');
Route::post('/disposisisuratmasuk', [SuratMasukController::class, 'disposisiSM'])->middleware('operator');

Route::get('/tambahsuratkeluar', [SuratKeluarController::class, 'create'])->middleware('kasikasubag');
Route::get('/suratkeluar', [SuratKeluarController::class, 'index'])->middleware('kasikasubag');
Route::get('/sksudahdibaca/{id_sk}', [SuratKeluarController::class, 'sksudahdibaca'])->middleware('kasikasubag');
Route::get('/datasuratkeluar', [SuratKeluarController::class, 'list'])->middleware('operator');
Route::get('/validasisuratkeluar', [SuratKeluarController::class, 'SKcamat'])->middleware('camat');
Route::get('/suratkeluarsekcam', [SuratKeluarController::class, 'SKsekcam'])->middleware('sekcam');
Route::get('/daftarsuratkeluar', [SuratKeluarController::class, 'listSKcamat'])->middleware('camat');
Route::get('/daftarsuratkeluarsekcam', [SuratKeluarController::class, 'listSKsekcam'])->middleware('sekcam');


Route::post('/tambahsuratkeluar', [SuratKeluarController::class, 'store'])->middleware('kasikasubag');
Route::post('/validasiSKsekcam', [SuratKeluarController::class, 'validasiSKsekcam'])->middleware('sekcam');
Route::post('/disposisisuratkeluar', [SuratKeluarController::class, 'disposisiSK'])->middleware('operator');
Route::post('/validasiSKcamat', [SuratKeluarController::class, 'validasiSKcamat'])->middleware('camat');
Route::post('/submitnoregis', [SuratKeluarController::class, 'submitnoregis'])->middleware('operator');
