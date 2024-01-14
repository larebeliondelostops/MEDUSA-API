<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Viper\StageController;

/*
|--------------------------------------------------------------------------
| API Routes Stage
|--------------------------------------------------------------------------
|
| Aqui estarán todas las rutas relacionadas con el manejo de Stages en el proyecto
|
*/

Route::get('stage', [StageController::class, 'index']);
Route::post('stage', [StageController::class, 'store']);
Route::put('stage/{stageId}', [StageController::class, 'update']);
Route::delete('stage/{stageId}', [StageController::class, 'destroy']);
