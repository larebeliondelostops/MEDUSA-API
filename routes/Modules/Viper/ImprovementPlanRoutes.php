<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Modules\Viper\ImprovementPlanController;

Route::prefix('/viper/improvementPlan')->group(function () {
    Route::post('/create', [ImprovementPlanController::class, 'store']);
    Route::put('/update/{id}', [ImprovementPlanController::class, 'update']);
    Route::get('/list/{alertId}', [ImprovementPlanController::class, 'index']);
    Route::get('/detail/{id}', [ImprovementPlanController::class, 'show']);
    Route::delete('/delete/{id}', [ImprovementPlanController::class, 'destroy']);
});
