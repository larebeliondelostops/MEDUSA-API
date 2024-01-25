<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Viper\ReportController;

Route::prefix('/viper/report')->group(function ()  {
    Route::post('/create', [ReportController::class, 'store']);
    Route::put('/update/{id}', [ReportController::class, 'update']);
    Route::get('/list/{projectId}', [ReportController::class, 'index'])->name('index');
    Route::get('/detail/{id}', [ReportController::class, 'show']);
    Route::delete('/delete/{id}', [ReportController::class, 'destroy']);
});

