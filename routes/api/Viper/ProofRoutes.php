<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Viper\ProofController;

Route::prefix('/viper/proof')->group(function () {
    Route::post('/create', [ProofController::class, 'store']);
    Route::put('/update/{id}', [ProofController::class, 'update']);
    Route::get('/list/{productId}', [ProofController::class, 'index']);
    Route::get('/listByProject/{projectId}', [ProofController::class, 'view']);
    Route::get('/detail/{id}', [ProofController::class, 'show']);
    Route::delete('/delete/{id}', [ProofController::class, 'destroy']);
});
