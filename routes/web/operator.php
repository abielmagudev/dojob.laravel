<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OperatorAuthController;

Route::prefix('operator')->group(function () {
    Route::get('/', [OperatorAuthController::class, 'index'])->name('operators_auth.index');
    Route::get('/{work}', [OperatorAuthController::class, 'show'])->name('operators_auth.show');
    Route::patch('/{work}', [OperatorAuthController::class, 'update'])->name('operators_auth.update');
});
