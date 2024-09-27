<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Modules\Viper\CommentController;

Route::prefix('/viper/comment')->group(function () {
    Route::post('/create', [CommentController::class, 'store']);
    Route::put('/update/{id}', [CommentController::class, 'update']);
    Route::get('/list/{progressId}', [CommentController::class, 'index']);
    Route::get('/detail/{id}', [CommentController::class, 'show']);
    Route::delete('/delete/{id}', [CommentController::class, 'destroy']);
});
