<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Modules\Viper\ProjectController;

Route::prefix("/viper/project")->group(function () {
    Route::post('/create', [ProjectController::class, 'store']);
    Route::put('/update/{bpin}', [ProjectController::class, 'update']);
    Route::get('/list', [ProjectController::class, 'index']);
    Route::get('/get/{bpin}', [ProjectController::class, 'show']);
    Route::delete('/delete/{bpin}', [ProjectController::class, 'destroy']);
});
