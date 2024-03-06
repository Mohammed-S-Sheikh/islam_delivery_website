<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\DelegateController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\StateController;
use Illuminate\Support\Facades\Route;

Route::post('/login', [AuthController::class, 'login']);

Route::group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::apiResource('admins', AdminController::class);
    Route::apiResource('cities', CityController::class);
    Route::apiResource('delegates', DelegateController::class);
    Route::apiResource('states', StateController::class);
    Route::apiResource('orders', OrderController::class);
});
