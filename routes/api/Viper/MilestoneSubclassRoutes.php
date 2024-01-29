<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Viper\MilestoneSubclassController;

Route::prefix('/viper/milestone-subclass')->group(function () {
    Route::post('/create', [MilestoneSubclassController::class, 'store']);
    Route::put('/update/{id}', [MilestoneSubclassController::class, 'update']);
    Route::get('/list/{milestoneClassId}', [MilestoneSubclassController::class, 'index']);
    Route::get('/show/{id}', [MilestoneSubclassController::class, 'show']);
    Route::delete('/delete/{id}', [MilestoneSubclassController::class, 'destroy']);
});
