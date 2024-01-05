<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Viper\FolderController;

/*
|--------------------------------------------------------------------------
| API Routes Folder
|--------------------------------------------------------------------------
|
| Aqui estarán todas las rutas relacionadas con el manejo de Folderos en el proyecto
|
*/

Route::post('folder/create', [FolderController::class, 'store']);
Route::get('folder/all/{project_id}', [FolderController::class, 'index']);
Route::get('folder/{folderId}', [FolderController::class, 'show']);
Route::delete('folder/{folderId}', [FolderController::class, 'destroy']);
Route::put('folder/{folderId}', [FolderController::class, 'update']);
