<?php

use App\Http\Controllers\BankController;
use App\Http\Controllers\JensController;
use App\Http\Controllers\KarbariController;
use App\Http\Controllers\SizeController;
use Illuminate\Http\Request;
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


Route::apiResource('sizes',SizeController::class);
Route::apiResource('banks',BankController::class);
Route::apiResource('jens',JensController::class);
Route::apiResource('karbari',KarbariController::class);



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
