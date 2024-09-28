<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Modules\Viper\ProgressController;

Route::prefix('/viper/progress')->group(function () {
    Route::post('/create', [ProgressController::class, 'store']);
    Route::put('/update/{id}', [ProgressController::class, 'update']);
    Route::put('/updateStatus/{id}', [ProgressController::class, 'updateStatus']);
    Route::get('/list/{activityId}', [ProgressController::class, 'index']);
    Route::get('/detail/{id}', [ProgressController::class, 'show']);
    Route::get('/statistics/{projectId}', [ProgressController::class, 'display']);
    Route::delete('/delete/{id}', [ProgressController::class, 'destroy']);
});
