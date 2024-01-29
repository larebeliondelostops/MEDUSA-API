<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Viper\MilestoneClassController;

Route::prefix('/viper/milestone-class')->group(function () {
    Route::post('/create', [MilestoneClassController::class, 'store']);
    Route::put('/update/{id}', [MilestoneClassController::class, 'update']);
    Route::get('/list', [MilestoneClassController::class, 'index']);
    Route::get('/show/{id}', [MilestoneClassController::class, 'show']);
    Route::delete('/delete/{id}', [MilestoneClassController::class, 'destroy']);
});