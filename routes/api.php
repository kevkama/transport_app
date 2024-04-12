<?php

use App\http\Controllers\AreasController;
use App\Http\Controllers\AuthController;
use App\http\Controllers\DriversController;
use App\http\Controllers\TrucksController;
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

Route::middleware('auth:sanctum')->group(function () {
    Route::get("/area", [AreasController::class, 'readAllAreas']);

    // return $request->user();
});
// public APIs
Route::post('/register',[AuthController::class, 'register']);
Route::post('/login',[AuthController::class, 'login']);

Route::post("/area", [AreasController::class, 'createArea']);
// Route::get("/area", [AreasController::class, 'readAllAreas']);
Route::get("/area/{id}", [AreasController::class, 'readArea']);
Route::post("/area/{id}", [AreasController::class, 'updateArea']);
Route::delete("/area/{id}", [AreasController::class, 'deleteArea']);

Route::post("/driver", [DriversController::class, 'createDriver']);
Route::get("/driver", [DriversController::class, 'readAllDrivers']);
Route::get("/driver/{id}", [DriversController::class, 'readDriver']);
Route::post("/driver/{id}", [DriversController::class, 'updateDriver']);
Route::delete("/driver/{id}", [DriversController::class, 'deleteDriver']);

Route::post("/truck", [TrucksController::class, 'createTruck']);
Route::get("/truck", [TrucksController::class, 'readAllTrucks']);
Route::get("/truck/{id}", [TrucksController::class, 'readTruck']);
Route::post("/truck/{id}", [TrucksController::class, 'updateTruck']);
Route::delete("/truck/{id}", [TrucksController::class, 'deleteTruck']);

// Protected APIs
