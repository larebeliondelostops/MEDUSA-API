<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Modules\Viper\ActivityControlController;


Route::prefix('/viper/activityControl')->group(function () {
    Route::get('/listByProject/{projectId}', [ActivityControlController::class, 'index']);
});