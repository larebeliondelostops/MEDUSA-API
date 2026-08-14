<?php

use App\Http\Controllers\IndicatorController;
use Illuminate\Support\Facades\Route;

Route::middleware(['jwt.verify'])->group(function () {
    Route::get('indicators', [IndicatorController::class, 'index']);
    Route::get('indicators/{indicator}/subindicators', [IndicatorController::class, 'subindicators']);

    // Alias conservado para clientes que ya integraron la primera versión.
    Route::get('indicator/{indicator}/subindicators', [IndicatorController::class, 'subindicators']);
});
