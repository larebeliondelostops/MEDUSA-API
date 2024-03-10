<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Viper\IndicatorController;

Route::prefix('/viper/indicator')->group(function () {
    Route::post('/create', [IndicatorController::class, 'store']);
    Route::put('/update/{id}', [IndicatorController::class, 'update']);
    Route::get('/list/{productId}', [IndicatorController::class, 'index']);
    Route::get('/detail/{id}', [IndicatorController::class, 'show']);
    Route::delete('/delete/{id}', [IndicatorController::class, 'destroy']);
});
