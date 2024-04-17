<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RolController;
use App\Http\Controllers\AuthController;

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
    Route::post('roles/assignRol', [RolController::class, 'assignRol']); // Asigna un rol
    Route::post('roles/assignRolToUser', [RolController::class, 'assignRolToUser']); // Asigna un rol a un usuario por token

    /**
     * Manejo de permisos
     */
    Route::post('roles/savePermiso', [RolController::class, 'savePermiso']);
    Route::post('roles/assignPermissions', [RolController::class, 'assignPermissions']);
    Route::post('roles/assignPermissionsToUser', [RolController::class, 'assignPermissionsToUser']);

    Route::post('auth/google', [AuthController::class, 'loginGoogle']); // Creación de usuarios
});