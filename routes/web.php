<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\MahasiswaController as AdminMahasiswaController;

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
});

/* ADMIN */
Route::group(['prefix' => 'admin'], function () {
    Route::get('/', [AdminDashboardController::class, 'index']);

    // mahasiswa
    Route::get('/mahasiswa', [AdminMahasiswaController::class, 'index']);
    Route::get('/mahasiswa/create', [AdminMahasiswaController::class, 'create']);
    Route::post('/mahasiswa', [AdminMahasiswaController::class, 'store']);
    Route::get('/mahasiswa/{id}', [AdminMahasiswaController::class, 'show']);
    Route::get('/mahasiswa/{id}/edit', [AdminMahasiswaController::class, 'edit']);
    Route::put('/mahasiswa/{id}', [AdminMahasiswaController::class, 'update']);
    Route::delete('/mahasiswa/{id}', [AdminMahasiswaController::class, 'destroy']);
});
