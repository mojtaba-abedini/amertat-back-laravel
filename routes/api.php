<?php

use App\Http\Controllers\BankController;
use App\Http\Controllers\GramController;
use App\Http\Controllers\JensController;
use App\Http\Controllers\KarbariController;
use App\Http\Controllers\PaperPriceController;
use \App\Http\Controllers\ServicePriceController;
use App\Http\Controllers\SizeController;
use App\Http\Controllers\StoreController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VahedPriceController;
use \App\Http\Controllers\ShitController;
use \App\Http\Controllers\TarafHesabController;
use \App\Http\Controllers\PaperSizeController;
use \App\Http\Controllers\StatusController;
use \App\Http\Controllers\OrderController;
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
Route::apiResource('vahed',VahedPriceController::class);
Route::apiResource('paperprice',PaperPriceController::class);
Route::apiResource('service',ServicePriceController::class);
Route::apiResource('store',StoreController::class);
Route::apiResource('gram',GramController::class);
Route::apiResource('shits',ShitController::class);
Route::apiResource('tarafhesab',TarafHesabController::class);
Route::apiResource('papersize',PaperSizeController::class);
Route::apiResource('status',StatusController::class);
Route::apiResource('orders',OrderController::class);






Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
