<?php

use App\Http\Controllers\Api\BookingController;
use App\Http\Controllers\JenisKendaraanController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\JenisServiceController;
use App\Http\Controllers\JenisTransmisiController;
use App\Http\Controllers\PartCategoryController;
use App\Http\Controllers\PartController;
use App\Http\Controllers\TipController;
use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::get('/', function() {
    return redirect()->route('dashboard.index');
});

Route::group(['middleware' => ['auth']], function() {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
    Route::resource('jenis_kendaraan', JenisKendaraanController::class);
    Route::resource('jenis_transmisi', JenisTransmisiController::class);
    Route::resource('part_category', PartCategoryController::class);
    Route::resource('booking', BookingController::class);
    Route::resource('part', PartController::class);
    Route::resource('tips', TipController::class);
});
