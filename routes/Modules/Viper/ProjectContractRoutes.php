<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Modules\Viper\ProjectContractController;

Route::prefix('/viper/projectContract')->group(function () {
    Route::post('/create', [ProjectContractController::class, 'store']);
});
