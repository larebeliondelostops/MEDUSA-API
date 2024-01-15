<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Viper\SpecificObjectiveController;

Route::prefix('/viper/specificobjective')->group(function () {
    Route::post('/create', [SpecificObjectiveController::class, 'store']);
    Route::put('/update/{id}', [SpecificObjectiveController::class, 'update']);
    Route::get('/list', [SpecificObjectiveController::class, 'index']);
    Route::get('/get/{id}', [SpecificObjectiveController::class, 'show']);
    Route::delete('/delete/{id}', [SpecificObjectiveController::class, 'destroy']);
});

