<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Modules\Viper\SelectsController;

/*
|--------------------------------------------------------------------------
| API Routes Selects
|--------------------------------------------------------------------------
|
| Aqui estarán todas las rutas relacionadas con el manejo de Selectss en el proyecto
|
*/

Route::prefix('/viper/selects')->group(function () {
    Route::get('/list', [SelectsController::class, 'index']);
});

