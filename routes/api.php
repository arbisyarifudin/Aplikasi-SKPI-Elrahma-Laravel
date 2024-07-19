<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::prefix('v1')->group(function () {
    // get prodi by jenjang pendidikan id
    Route::get('/prodi', [App\Http\Controllers\Api\ProdiController::class, 'index']);

    // get prodi by id
    Route::get('/prodi/{id}', [App\Http\Controllers\Api\ProdiController::class, 'show']);

    // get mahasiswa prodi by prodi id
    Route::get('/mahasiswa-prodi', [App\Http\Controllers\Api\MahasiswaProdiController::class, 'index']);
});
