<?php

use App\Http\Controllers\Modules\Viper\ProjectMunicipalityController;
use Illuminate\Support\Facades\Route;

Route::prefix('/viper/project-municipality')->group(function () {
    Route::post('/create/{id}', [ProjectMunicipalityController::class, 'store']);
    Route::get('/list', [ProjectMunicipalityController::class, 'index']);
    Route::get('/get/{id}', [ProjectMunicipalityController::class, 'show']);
    Route::delete('/delete/{id}', [ProjectMunicipalityController::class, 'destroy']);
});
