<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ModulesController;

/*
|--------------------------------------------------------------------------
| API Routes Forms
|--------------------------------------------------------------------------
|
| Aqui estarán todas las rutas relacionadas con el manejo de modulos
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
});