<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;

/*
|--------------------------------------------------------------------------
| API Routes MENU
|--------------------------------------------------------------------------
|
| Aqui estarán todas las rutas relacionadas con el manejo de menu's
| y los permisos de la aplicación siguiendo ciertos estandares
| además de estar alejadas de las demás para manejar un orden estructurado
|
*/

Route::middleware([/* 'jwt.verify' *//* , 'role:Administrador' */])->group(function() {
    /**
     * Manejo de acciones para el menu
     */
    Route::get('menu/commandBar', [MenuController::class, 'commandBar']);
    Route::get('menu/menuBar', [MenuController::class, 'menuBar']);

    /**
     * Manejo de data precargada al iniciar sesion
     */
    Route::get('seetings/initialData', [MenuController::class, 'initialData']);
});