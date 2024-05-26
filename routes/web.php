<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UjianController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\TentorController;
use App\Http\Controllers\NilaiController;

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
    return view('auth.login');
});

Route::post('/logout', function (Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect('auth.login');
});

Auth::routes();

Route::get('/dashboard', [HomeController::class, 'index'])->name('home');

Route::put('/profile/password/{akun}', [ProfileController::class, 'changePass'])->name('changePass');
Route::resource('/profile', ProfileController::class);

Route::get('/ujian/{ujian}/tambah-soal', [UjianController::class, 'tambahSoal'])->name('tambahSoal');
Route::post('/ujian/tambah-soal', [UjianController::class, 'insertSoal'])->name('insertSoal');
Route::get('/ujian/{ujian}/edit-soal', [UjianController::class, 'editSoal'])->name('editSoal');
Route::put('/ujian/soal/{soal}', [UjianController::class, 'updateSoal'])->name('updateSoal');
Route::delete('/ujian/soal/{soal}', [UjianController::class, 'deleteSoal'])->name('deleteSoal');

Route::get('/ujian/{ujian}/token', [UjianController::class, 'token'])->name('token');
Route::post('/ujian/token', [UjianController::class, 'cekToken'])->name('cekToken');
Route::get('/ujian/mulai/{ujian}', [UjianController::class, 'mulai'])->name('mulai');
Route::post('/ujian/selesai', [UjianController::class, 'finish'])->name('finish');

Route::resource('/ujian', UjianController::class);

Route::resource('/akun/admin', AdminController::class);
Route::get('/akun/admin/{admin}/edit-role', [AdminController::class, 'editRole'])->name('admin.role');
Route::put('/akun/admin/{admin}/role', [AdminController::class, 'updateRole'])->name('admin.upRole');

Route::resource('/akun/siswa', SiswaController::class);
Route::get('/akun/siswa/{siswa}/edit-role', [SiswaController::class, 'editRole'])->name('siswa.role');
Route::put('/akun/siswa/{siswa}/role', [SiswaController::class, 'updateRole'])->name('siswa.upRole');

Route::resource('/akun/tentor', TentorController::class);
Route::get('/akun/tentor/{tentor}/edit-role', [TentorController::class, 'editRole'])->name('tentor.role');
Route::put('/akun/tentor/{tentor}/role', [TentorController::class, 'updateRole'])->name('tentor.upRole');

Route::resource('/nilai', NilaiController::class);
Route::get('/nilai/export/{nilai}', [NilaiController::class, 'export'])->name('export.nilai');
