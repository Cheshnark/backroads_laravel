<?php

use App\Http\Controllers\LocationsController;
use App\Http\Controllers\LoginController;
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

Route::post('login', [LoginController::class, 'login'])->name('login');
Route::post('register', [LoginController::class, 'register'])->name('register');
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

Route::group(['prefix' => 'user', 'namespace' => 'App\Http\Controllers'], function(){
    Route::apiResource('users', UserController::class);
    Route::apiResource('profiles', ProfileController::class);
});

Route::group(['prefix' => 'location', 'namespace' => 'App\Http\Controllers'], function(){
    Route::apiResource('locations', LocationsController::class);
});