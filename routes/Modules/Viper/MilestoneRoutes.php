<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Viper\MilestoneController;

Route::prefix('/viper/milestone')->group(function () {
    Route::post('/create', [MilestoneController::class, 'store']);
    Route::put('/update/{id}', [MilestoneController::class, 'update']);
    Route::get('/list/{projectId}', [MilestoneController::class, 'index']);
    Route::get('/detail/{id}', [MilestoneController::class, 'show']);
    Route::delete('/delete/{id}', [MilestoneController::class, 'destroy']);
});
