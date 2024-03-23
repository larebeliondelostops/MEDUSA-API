<?php

use App\Http\Controllers\Viper\ScheduleController;
use Illuminate\Support\Facades\Route;

Route::prefix('/viper/schedule')->group(function () {
    // Route::post('/create', [DepartmentController::class, 'store']);
    // Route::put('/update/{id}', [DepartmentController::class, 'update']);
    // Route::get('/list', [DepartmentController::class, 'index']);
    Route::get('/get/{projectBpin}', [ScheduleController::class, 'show']);
    // Route::delete('/delete/{id}', [DepartmentController::class, 'destroy']);
});
