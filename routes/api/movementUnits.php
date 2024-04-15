<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovementEntitiesController;


Route::middleware([/* 'jwt.verify' */])->group(function() {

    Route::get('movementUnits/avlHistory', [MovementEntitiesController::class, 'avlHistory']);
    Route::get('movementUnits/avlPosition', [MovementEntitiesController::class, 'avlPosition']);
    Route::get('movementUnits/avlUnits', [MovementEntitiesController::class, 'avlUnits']);

    Route::get('traffic/getDataWaze', [MovementEntitiesController::class, 'getDataWaze']);
});