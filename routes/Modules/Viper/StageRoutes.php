<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Modules\Viper\StageController;

/*
|--------------------------------------------------------------------------
| API Routes Stage
|--------------------------------------------------------------------------
|
| Aqui estarán todas las rutas relacionadas con el manejo de Stages en el proyecto
|
*/

Route::prefix('/viper/stage')->group(function () {
    Route::get('/list', [StageController::class, 'index']);
    Route::post('/create', [StageController::class, 'store']);
    Route::put('/update/{stageId}', [StageController::class, 'update']);
    Route::delete('/delete/{stageId}', [StageController::class, 'destroy']);
});

