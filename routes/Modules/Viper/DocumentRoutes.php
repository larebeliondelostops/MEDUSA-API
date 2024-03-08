<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Viper\DocumentController;

/*
|--------------------------------------------------------------------------
| API Routes Documents
|--------------------------------------------------------------------------A<
|
| Aqui estarán todas las rutas relacionadas con el manejo de documentos en el proyecto
|
*/

Route::prefix('/viper/document')->group(function () {
    Route::post('create', [DocumentController::class, 'store']);
    Route::get('list/project/{projectId}', [DocumentController::class, 'index']);
    Route::get('list/folder/{folderId}', [DocumentController::class, 'indexByFolder']);
    Route::get('listSpaces', [DocumentController::class, 'allSpaces']);
    Route::get('listDeleted/folder/{folderId}', [DocumentController::class, 'getDeletedDocumentsByFolder']);
    Route::get('listDeleted/project/{projectId}', [DocumentController::class, 'getDeletedDocumentsByProject']);
    Route::delete('delete/{documentId}', [DocumentController::class, 'destroy']);
    Route::delete('deletePermanent/{documentId}', [DocumentController::class, 'destroyForce']); 
    Route::delete('delete/several', [DocumentController::class, 'destroySeveral']);
    Route::delete('deletePermanent/several', [DocumentController::class, 'destroyForceSeveral']);
    Route::put('restore/{documentId}', [DocumentController::class, 'restoreDocument']);
    Route::put('update/{documentId}', [DocumentController::class, 'update']);
});
