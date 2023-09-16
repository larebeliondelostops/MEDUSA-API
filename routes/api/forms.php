<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormsController;

/*
|--------------------------------------------------------------------------
| API Routes Forms
|--------------------------------------------------------------------------
|
| Aqui estarán todas las rutas relacionadas con el manejo de formularios
| de la aplicación buscando su dinamismo.
|
*/

Route::middleware([/* 'jwt.verify' */])->group(function() {
    /**
     * Exposición de data para hacer un CRUD
     */
    Route::get('forms/modules', [FormsController::class, 'modules']);
    Route::get('forms/fields', [FormsController::class, 'fields']);

    /**
     * Manejo de formularios
     */
    Route::get('forms/user', [FormsController::class, 'user']);
    Route::get('forms/alarm', [FormsController::class, 'alarm']);
    Route::get('forms/pollingPlace', [FormsController::class, 'pollingPlace']);
});