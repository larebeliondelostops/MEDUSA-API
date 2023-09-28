<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormsController;
use App\Http\Controllers\ModulesController;

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
     * Rutas para el manejo de modulos
     */
    Route::get('forms/module/all', [ModulesController::class, 'all']);
    Route::post('forms/module/store', [ModulesController::class, 'store']);
    Route::put('forms/module/update/{id}', [ModulesController::class, 'update']);
    Route::delete('forms/module/delete/{id}', [ModulesController::class, 'destroy']);

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
    Route::get('forms/ambient', [FormsController::class, 'ambient']);
    Route::get('forms/pollingPlace', [FormsController::class, 'pollingPlace']);

    /**
     * Creación de formularios
     */
    Route::get('forms/edit/{module}', [FormsController::class, 'edit']);
    Route::post('forms/store', [FormsController::class, 'store']);
    Route::get('forms/update/{module}', [FormsController::class, 'update']);
});