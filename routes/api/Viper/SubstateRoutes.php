<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Viper\SubstateController;

/*
|--------------------------------------------------------------------------
| API Routes Substate
|--------------------------------------------------------------------------
|
| Aqui estarán todas las rutas relacionadas con el manejo de Substates en el proyecto
|
*/

Route::prefix('/viper/substate')->group(function () {
    Route::get('/list', [SubstateController::class, 'index']);
    Route::get('/list/state/{stateId}', [SubstateController::class, 'listByState']);
    Route::post('/create', [SubstateController::class, 'store']);
    Route::put('/update/{substateId}', [SubstateController::class, 'update']);
    Route::delete('/delete/{substateId}', [SubstateController::class, 'destroy']);
});

