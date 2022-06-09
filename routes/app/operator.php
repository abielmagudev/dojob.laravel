<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OperatorAuthController;

Route::controller(OperatorAuthController::class)->group( function () {
    Route::get('operator/', 'index')->name('operators_auth.index');
    Route::get('operator/{work}', 'show')->name('operators_auth.show');
    Route::patch('operator/{work}', 'update')->name('operators_auth.update');
});
