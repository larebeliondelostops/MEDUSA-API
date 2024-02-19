<?php

use App\Http\Controllers\Viper\LocationController;
use Illuminate\Support\Facades\Route;

Route::prefix("/viper/location")->group(function () {
    Route::post('/create', [LocationController::class, 'store']);
    Route::put('/update/{locationId}', [LocationController::class, 'update']);
    // Route::get('/list', [LocationController::class, 'index']);
    Route::get('/get/{locationId}', [LocationController::class, 'show']);
    Route::delete('/delete/{locationId}', [LocationController::class, 'destroy']);
});
