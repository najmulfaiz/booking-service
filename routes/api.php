<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('auth/register', \App\Http\Controllers\Api\Auth\RegisterController::class);
Route::post('auth/login', \App\Http\Controllers\Api\Auth\LoginController::class);
Route::get('referensi/provinces', [\App\Http\Controllers\Api\ReferensiController::class, 'provinces']);
Route::get('referensi/regencies', [\App\Http\Controllers\Api\ReferensiController::class, 'regencies']);
Route::group(['middleware' => ['auth:sanctum']], function() {
    Route::get('user', [\App\Http\Controllers\Api\Auth\UserController::class, 'index']);
    Route::get('jenis_kendaraan', [\App\Http\Controllers\Api\JenisKendaraanController::class, 'index']);
    Route::get('jenis_transmisi', [\App\Http\Controllers\Api\JenisTransmisiController::class, 'index']);
    Route::get('part_category', [\App\Http\Controllers\Api\PartCategoryController::class, 'index']);
    Route::get('part', [\App\Http\Controllers\Api\PartController::class, 'index']);
    Route::post('part', [\App\Http\Controllers\Api\PartController::class, 'store']);
    Route::get('part/{part_id}', [\App\Http\Controllers\Api\PartController::class, 'show']);
    Route::get('booking', [\App\Http\Controllers\Api\BookingController::class, 'index']);
    Route::post('booking', [\App\Http\Controllers\Api\BookingController::class, 'store']);
    Route::get('booking/{part_id}', [\App\Http\Controllers\Api\BookingController::class, 'show']);
    Route::get('tip', [\App\Http\Controllers\Api\TipController::class, 'index']);
});
