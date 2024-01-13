<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Viper\DocumentController;

/*
|--------------------------------------------------------------------------
| API Routes Documents
|--------------------------------------------------------------------------
|
| Aqui estarán todas las rutas relacionadas con el manejo de documentos en el proyecto
|
*/

Route::prefix('/viper/document')->group(function () {
    Route::post('create', [DocumentController::class, 'store']);
    Route::get('list', [DocumentController::class, 'index']);
    Route::get('list-spaces', [DocumentController::class, 'allSpaces']);
    Route::delete('delete/{documentId}', [DocumentController::class, 'destroy']);
    Route::put('update/{documentId}', [DocumentController::class, 'update']);
});
