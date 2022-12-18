<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\WargaController;
use App\Http\Controllers\ClientApiController;

/*
|------------------------------- -------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('dashboard');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/warga', [WargaController::class, 'index']);
    Route::get('/warga/create', [WargaController::class, 'create']);
    Route::post('/warga/store', [WargaController::class, 'store']);
    Route::get('/warga/edit/{id}', [WargaController::class, 'edit']);
    Route::put('/warga/update/{id}', [WargaController::class, 'update']);
    Route::delete('/warga/delete/{id}', [WargaController::class, 'destroy']);
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//API CLIENT
Route::get('/wargaapi/list', [ClientApiController::class, 'index']);
