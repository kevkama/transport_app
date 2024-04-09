<?php

use App\http\Controllers\AreasController;
use App\http\Controllers\DriversController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post("/area", [AreasController::class, 'createArea']);
Route::get("/area", [AreasController::class, 'readAllAreas']);
Route::get("/area/{id}", [AreasController::class, 'readArea']);
Route::post("/area/{id}", [AreasController::class, 'updateArea']);
Route::delete("/area/{id}", [AreasController::class, 'deleteArea']);

Route::post("/driver", [DriversController::class, 'createDriver']);
Route::get("/driver", [DriversController::class, 'readAllDrivers']);
Route::get("/driver/{id}", [DriversController::class, 'readDriver']);
Route::post("/driver/{id}", [DriversController::class, 'updateDriver']);
Route::delete("/driver/{id}", [DriversController::class, 'deleteDriver']);

