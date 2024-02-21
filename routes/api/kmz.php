<?php

use App\Http\Controllers\ImportKMZController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| API Routes KMZ controller
|--------------------------------------------------------------------------
|
| Aqui estarán todas las rutas relacionadas con el manejo de menu's
| y los permisos de la aplicación siguiendo ciertos estandares
| además de estar alejadas de las demás para manejar un orden estructurado
|
*/

Route::middleware([/* 'jwt.verify' *//* , 'role:Administrador' */])->group(function() {

    Route::post('/import/importLines', [ImportKMZController::class, 'importLines']);
    Route::post('/import/importPoints', [ImportKMZController::class, 'importPoints']);
    Route::post('/import/importDinamic', [ImportKMZController::class, 'importDinamic']);
    
});

