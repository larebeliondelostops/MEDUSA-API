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
    Route::get('forms/{slug}', [FormsController::class, 'getForm']);
    Route::get('form/{slug}', [FormsController::class, 'getForm']);

    /**
     * Creación de formularios
     */
    Route::get('forms/edit/{module}', [FormsController::class, 'edit']);
    Route::post('forms/store', [FormsController::class, 'store']);
    Route::get('forms/update/{module}', [FormsController::class, 'update']);
});
