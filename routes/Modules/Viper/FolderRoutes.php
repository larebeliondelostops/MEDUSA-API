<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Modules\Viper\FolderController;

/*
|--------------------------------------------------------------------------
| API Routes Folder
|--------------------------------------------------------------------------
|
| Aqui estarán todas las rutas relacionadas con el manejo de Folderos en el proyecto
|
*/

Route::prefix('/viper/folder')->group(function () {
    Route::post('create', [FolderController::class, 'store']);
    Route::get('list/project/{project_id}', [FolderController::class, 'index']);
    Route::get('listSelect/project/{project_id}', [FolderController::class, 'indexSelect']);
    Route::get('get/{folderId}', [FolderController::class, 'show']);
    Route::delete('delete/{folderId}', [FolderController::class, 'destroy']);
    Route::put('update/{folderId}', [FolderController::class, 'update']);
    Route::post('createMultiple', [FolderController::class, 'storeMultiple']);
    Route::post('createContract', [FolderController::class, 'storeContract']);
    Route::delete('delete/project/{projectId}', [FolderController::class, 'destroyByProject']); 
});