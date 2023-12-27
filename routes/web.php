<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController as AuthController;

use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\MahasiswaController as AdminMahasiswaController;
use App\Http\Controllers\Admin\JenjangController as AdminJenjangController;
use App\Http\Controllers\Admin\ProdiController as AdminProdiController;
use App\Http\Controllers\Admin\DokumenController as AdminDokumenController;
use App\Http\Controllers\Admin\PengaturanController as AdminPengaturanController;
use App\Http\Controllers\Admin\UserController as AdminUserController;

use App\Http\Controllers\Mahasiswa\DashboardController as MahasiswaDashboardController;

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

Route::get('/', function () {
    return view('home');
})->name('home');

/* AUTH */
Route::group(['prefix' => 'auth'], function () {
    Route::post('login', [AuthController::class, 'postLogin'])->name('auth.post-login');
    Route::get('logout', [AuthController::class, 'logout'])->name('auth.logout');
});

/* ADMIN */
Route::group(['middleware' => ['auth','role:admin'], 'prefix' => 'admin'], function () {
    Route::get('/', [AdminDashboardController::class, 'index'])->name('admin.dashboard');


    // user
    Route::get('/user/profil', [AdminUserController::class, 'profile'])->name('admin.user.profile');
    Route::put('/user/profil', [AdminUserController::class, 'updateProfile'])->name('admin.user.update-profile');
    Route::get('/user/kata-sandi', [AdminUserController::class, 'password'])->name('admin.user.password');
    Route::put('/user/kata-sandi', [AdminUserController::class, 'updatePassword'])->name('admin.user.update-password');

    // mahasiswa
    Route::get('/mahasiswa', [AdminMahasiswaController::class, 'index'])->name('admin.mahasiswa.index');
    Route::get('/mahasiswa/tambah', [AdminMahasiswaController::class, 'create']);
    Route::post('/mahasiswa', [AdminMahasiswaController::class, 'store']);
    Route::get('/mahasiswa/{id}', [AdminMahasiswaController::class, 'show']);
    Route::get('/mahasiswa/{id}/ubah', [AdminMahasiswaController::class, 'edit']);
    Route::put('/mahasiswa/{id}', [AdminMahasiswaController::class, 'update']);
    Route::delete('/mahasiswa/{id}', [AdminMahasiswaController::class, 'destroy']);

    // jenjang
    Route::get('/jenjang', [AdminJenjangController::class, 'index'])->name('admin.jenjang.index');
    Route::get('/jenjang/tambah', [AdminJenjangController::class, 'create'])->name('admin.jenjang.create');
    Route::post('/jenjang', [AdminJenjangController::class, 'store'])->name('admin.jenjang.store');
    Route::get('/jenjang/{id}/ubah', [AdminJenjangController::class, 'edit'])->name('admin.jenjang.edit');
    Route::put('/jenjang/{id}', [AdminJenjangController::class, 'update'])->name('admin.jenjang.update');
    Route::delete('/jenjang/{id}', [AdminJenjangController::class, 'destroy'])->name('admin.jenjang.destroy');

    // prodi
    Route::get('/prodi', [AdminProdiController::class, 'index'])->name('admin.prodi.index');
    Route::get('/prodi/tambah', [AdminProdiController::class, 'create'])->name('admin.prodi.create');
    Route::post('/prodi', [AdminProdiController::class, 'store'])->name('admin.prodi.store');
    Route::get('/prodi/{id}/ubah', [AdminProdiController::class, 'edit'])->name('admin.prodi.edit');
    Route::put('/prodi/{id}', [AdminProdiController::class, 'update'])->name('admin.prodi.update');
    Route::delete('/prodi/{id}', [AdminProdiController::class, 'destroy'])->name('admin.prodi.destroy');

    // dokumen
    Route::get('/dokumen', [AdminDokumenController::class, 'index'])->name('admin.dokumen.index');
    Route::get('/dokumen/buat', [AdminDokumenController::class, 'create'])->name('admin.dokumen.create');
    Route::post('/dokumen', [AdminDokumenController::class, 'store'])->name('admin.dokumen.store');
    Route::delete('/dokumen/{id}', [AdminDokumenController::class, 'destroy'])->name('admin.dokumen.destroy');


    // pengaturan
    Route::get('/pengaturan', [AdminPengaturanController::class, 'index'])->name('admin.pengaturan.index');
    Route::post('/pengaturan', [AdminPengaturanController::class, 'update'])->name('admin.pengaturan.update');
});

/* MAHASISWA */
Route::group(['middleware' => ['auth', 'role:mahasiswa'], 'prefix' => 'mahasiswa'], function () {
    Route::get('/', [MahasiswaDashboardController::class, 'index'])->name('mahasiswa.dashboard');
});
