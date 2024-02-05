<?php

use App\Http\Controllers\LocationsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
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

Route::group(['prefix' => 'user', 'namespace' => 'App\Http\Controllers'], function(){
    Route::apiResource('users', UserController::class);
    Route::apiResource('profiles', ProfileController::class);
});

Route::group(['prefix' => 'location', 'namespace' => 'App\Http\Controllers'], function(){
    Route::apiResource('locations', LocationsController::class);
});