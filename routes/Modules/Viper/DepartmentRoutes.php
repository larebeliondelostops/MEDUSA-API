<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Viper\DepartmentController;

Route::prefix('/viper/department')->group(function () {
    Route::post('/create', [DepartmentController::class, 'store']);
    Route::put('/update/{id}', [DepartmentController::class, 'update']);
    Route::get('/list', [DepartmentController::class, 'index']);
    Route::get('/get/{id}', [DepartmentController::class, 'show']);
    Route::delete('/delete/{id}', [DepartmentController::class, 'destroy']);
});
