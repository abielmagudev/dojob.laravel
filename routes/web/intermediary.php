<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IntermediaryAuthController;

Route::prefix('intermediary')->group(function () {
    Route::get('/', [IntermediaryAuthController::class, 'index'])->name('intermediaries_auth.index');
    Route::get('/{work}', [IntermediaryAuthController::class, 'show'])->name('intermediaries_auth.show');
});
