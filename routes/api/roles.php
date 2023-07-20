<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RolController;

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
     * Manejo de Roles
     */
    Route::get('roles/getRoles', [RolController::class, 'getRoles']); // Listar todos los roles
    Route::post('roles/saveRol', [RolController::class, 'saveRol']); // Guardar un rol

    /**
     * Manejo de permisos
     */
    Route::post('roles/savePermiso', [RolController::class, 'savePermiso']);
    Route::post('roles/assignPermisos', [RolController::class, 'assignPermisos']);
});