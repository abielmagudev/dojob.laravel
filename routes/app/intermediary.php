<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IntermediaryAuthController;

Route::controller(IntermediaryAuthController::class)->group( function () {
    Route::get('intermediary/', 'index')->name('intermediaries_auth.index');
    Route::get('intermediary/{work}', 'show')->name('intermediaries_auth.show');
});
