<?php

use App\Helpers\VehicleBrandsFixture;
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
Route::get('veiculos/{vehicle}', [VehicleController::class, 'show']);
Route::post('veiculos', [VehicleController::class, 'store']);
Route::put('veiculos/{vehicle}', [VehicleController::class, 'update']);
Route::patch('veiculos/{vehicle}', [VehicleController::class, 'update']);
Route::delete('veiculos/{vehicle}', [VehicleController::class, 'destroy']);

Route::get('marcas', function () {
  return response()->json(['data' => VehicleBrandsFixture::getBrands4Select()], 200);
});
