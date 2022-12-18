<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientApiController;
use App\Http\Controllers\api\ApiWargaController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/warga/list', [ApiWargaController::class, 'index']);
Route::get('/warga/show/{id}', [ApiWargaController::class, 'show']);
Route::post('/warga/create', [ApiWargaController::class, 'store']);
Route::put('/warga/update/{id}', [ApiWargaController::class, 'update']);
Route::delete('/warga/delete/{id}', [ApiWargaController::class, 'destroy']);

