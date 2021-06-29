<?php

use App\Http\Controllers\VehicleController;
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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('veiculos', [VehicleController::class, 'index']);
Route::get('veiculos/find', [VehicleController::class, 'find']);
Route::get('veiculos/{id}', [VehicleController::class, 'show']);
Route::post('veiculos', [VehicleController::class, 'store']);
Route::put('veiculos/{id}', [VehicleController::class, 'update']);
Route::patch('veiculos/{id}', [VehicleController::class, 'update']);
Route::delete('veiculos/{id}', [VehicleController::class, 'destroy']);
