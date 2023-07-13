<?php

use App\Http\Controllers\IndoRegionController;
use App\Http\Controllers\SubscriptionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;


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
    return view('welcome');
});

// Tugas 1
Route::get('/lokasi', [IndoRegionController::class,'lokasi'])->name('lokasi');
Route::post('/getkabupaten', [IndoRegionController::class,'getkabupaten'])->name('getkabupaten');
Route::post('/getkecamatan', [IndoRegionController::class,'getkecamatan'])->name('getkecamatan');
Route::post('/getdesa', [IndoRegionController::class,'getdesa'])->name('getdesa');

// Tugas 2
Route::view('/subscribe', 'subscribe')->name('subscribe');
Route::post('/subscribe', [SubscriptionController::class, 'subscribe']);