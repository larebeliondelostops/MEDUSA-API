<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Modules\Viper\AlertController;

Route::prefix('/viper/alert')->group(function () {
    Route::post('/create', [AlertController::class, 'store']);
    Route::put('/update/{id}', [AlertController::class, 'update']);
    Route::get('/listIndicator/{indicatorId}', [AlertController::class, 'index']);
    Route::get('/listProject/{projectId}', [AlertController::class, 'view']);
    Route::get('/detail/{id}', [AlertController::class, 'show']);
    Route::delete('/delete/{id}', [AlertController::class, 'destroy']);
});
