<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| API Routes Roles
|--------------------------------------------------------------------------
|
| Aqui estarán todas las rutas relacionadas con el manejo de roles
| y los permisos de la aplicación siguiendo ciertos estandares
| además de estar alejadas de las demás para manejar un orden estructurado
|
*/

Route::middleware(['jwt.verify'/* , 'role:Administrador' */])->group(function() {
    /**
     * Manejo de Usuarios
     */
    Route::post('users/asignacion/rol', [UserController::class, 'assignRol']); // Asignación de roles
});