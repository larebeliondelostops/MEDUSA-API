<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Modules\Viper\MunicipalityController;

Route::prefix('/viper/municipality')->group(function () {
    Route::post('/create', [MunicipalityController::class, 'store']);
    Route::put('/update/{id}', [MunicipalityController::class, 'update']);
    Route::get('/list', [MunicipalityController::class, 'index']);
    Route::get('/get/{id}', [MunicipalityController::class, 'show']);
    Route::delete('/delete/{id}', [MunicipalityController::class, 'destroy']);
});
