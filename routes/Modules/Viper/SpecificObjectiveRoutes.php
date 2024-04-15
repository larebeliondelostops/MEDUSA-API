<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Modules\Viper\SpecificObjectiveController;

Route::prefix('/viper/specificObjective')->group(function () {
    Route::post('/create', [SpecificObjectiveController::class, 'store']);
    Route::put('/update/{id}', [SpecificObjectiveController::class, 'update']);
    Route::get('/list/project/{projectId}', [SpecificObjectiveController::class, 'indexByProject']);
    Route::get('/list/{scopeId}', [SpecificObjectiveController::class, 'index']);
    Route::get('/get/{id}', [SpecificObjectiveController::class, 'show']);
    Route::delete('/delete/{id}', [SpecificObjectiveController::class, 'destroy']);
});

