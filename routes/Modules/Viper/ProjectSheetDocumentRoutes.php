<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Modules\Viper\ProjectSheetDocumentController;

Route::prefix('/viper/projectSheetDocument')->group(function () {
    Route::post('/create', [ProjectSheetDocumentController::class, 'store']);
    Route::put('/update/{id}', [ProjectSheetDocumentController::class, 'update']);
    Route::post('/addDocument/{id}', [ProjectSheetDocumentController::class, 'add']);
    Route::get('/list/{projectId}', [ProjectSheetDocumentController::class, 'index']);
    Route::get('/detail/{id}', [ProjectSheetDocumentController::class, 'show']);
    Route::delete('/delete/{id}', [ProjectSheetDocumentController::class, 'destroy']);
});
