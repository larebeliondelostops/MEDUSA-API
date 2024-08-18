<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Modules\Viper\StageControlController;

Route::prefix('/viper/stageControl')->group(function () {
    Route::get('/listAll', [StageControlController::class, 'index']);
    Route::get('/get/{id}', [StageControlController::class, 'show']);
    Route::post('/create', [StageControlController::class, 'store']);
    Route::put('/update/{id}', [StageControlController::class, 'update']);
    Route::delete('/delete/{id}', [StageControlController::class, 'destroy']);
});

