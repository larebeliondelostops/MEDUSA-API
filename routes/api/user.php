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
    Route::get('user/all', [UserController::class, 'all']); // Obtener todos los campos de la tabla entidades
    Route::get('user/getUser/{id}', [UserController::class, 'getUser']); // editar un campo en la tabla entidades
    Route::put('user/update/{id}', [UserController::class, 'update']); // editar un campo en la tabla entidades
    Route::delete('user/destroy/{id}', [UserController::class, 'destroy']); // editar un campo en la tabla entidades
    Route::post('user/asignacion/rol', [UserController::class, 'assignRol']); // Asignación de roles
    Route::post('user/store', [UserController::class, 'store']); // Creación de usuarios
});