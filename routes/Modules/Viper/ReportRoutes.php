<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Modules\Viper\ReportController;

Route::prefix('/viper/report')->group(function () {
    Route::post('/create', [ReportController::class, 'store']);
    Route::put('/update/{id}', [ReportController::class, 'update']);
    Route::get('/list/{activityId}', [ReportController::class, 'index']);
    Route::get('/list/proof/{activityId}', [ReportController::class, 'view']);
    Route::get('/listByProject/{projectId}', [ReportController::class, 'display']);
    Route::get('/detail/{id}', [ReportController::class, 'show']);
    Route::delete('/delete/{id}', [ReportController::class, 'destroy']);
});
