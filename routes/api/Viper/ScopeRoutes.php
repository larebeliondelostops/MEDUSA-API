<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Viper\ScopeController;

Route::prefix('/viper/scope')->group(function () {
    Route::post('/create', [ScopeController::class, 'store']);
    Route::put('/update/{id}', [ScopeController::class, 'update']);
    Route::get('/list', [ScopeController::class, 'index']);
    Route::get('/get/{id}', [ScopeController::class, 'show']);
    Route::delete('/delete/{id}', [ScopeController::class, 'destroy']);
});
