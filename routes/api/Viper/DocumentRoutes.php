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

Route::post('document/create', [DocumentController::class, 'store']);
Route::get('document/', [DocumentController::class, 'index']);
Route::get('document/spaces', [DocumentController::class, 'allSpaces']);
Route::delete('document/{documentId}', [DocumentController::class, 'destroy']);
Route::put('document/{documentId}', [DocumentController::class, 'update']);