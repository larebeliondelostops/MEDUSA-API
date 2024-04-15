<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Modules\Viper\ProjectUserRoleController;

Route::prefix('/viper/projectUserRole')->group(function () {
    Route::post('/create', [ProjectUserRoleController::class, 'store']);
    Route::put('/update/{id}', [ProjectUserRoleController::class, 'update']);
    Route::get('/list/{projectId}', [ProjectUserRoleController::class, 'index']);
    Route::get('/detail/{id}', [ProjectUserRoleController::class, 'show']);
    Route::delete('/delete/{id}', [ProjectUserRoleController::class, 'destroy']);
});
