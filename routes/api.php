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
});
