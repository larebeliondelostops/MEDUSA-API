<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Modules\Viper\MilestoneSubclassController;

Route::prefix('/viper/milestoneSubclass')->group(function () {
    Route::post('/create', [MilestoneSubclassController::class, 'store']);
    Route::put('/update/{id}', [MilestoneSubclassController::class, 'update']);
    Route::get('/list/{milestoneClassId}', [MilestoneSubclassController::class, 'index']);
    Route::get('/listAll', [MilestoneSubclassController::class, 'view']);
    Route::get('/detail/{id}', [MilestoneSubclassController::class, 'show']);
    Route::delete('/delete/{id}', [MilestoneSubclassController::class, 'destroy']);
});
