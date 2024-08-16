<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Modules\Viper\MessageBotController;

Route::prefix('/viper/messageBot')->group(function () {
    Route::post('/create', [MessageBotController::class, 'store']);
    Route::post('/uploadFiles', [MessageBotController::class, 'uploadFiles']);
    Route::get('/{bpin}', [MessageBotController::class, 'index']);
    Route::get('/detail/{id}', [MessageBotController::class, 'show']);
    Route::delete('/delete/{id}', [MessageBotController::class, 'destroy']);
});
