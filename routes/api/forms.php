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

Route::middleware(['jwt.verify'])->group(function() {
    /**
     * Manejo de formularios
     */
    Route::get('forms/user', [FormsController::class, 'user']);
});