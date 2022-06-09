<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\CrewController;
use App\Http\Controllers\IntermediaryController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\OperatorController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WarrantyController;
use App\Http\Controllers\WorkController;

// CREW
Route::controller(CrewController::class)->group( function () {
    Route::get('crews/{crew}/operators', 'manageOperators')->name('crews.operators.manage');
    Route::put('crews/{crew}/operators', 'updateOperators')->name('crews.operators.update');
});
Route::resource('crews', CrewController::class);

// JOB
Route::controller(JobController::class)->group( function () {
    Route::get('jobs/{job}/plugins', 'managePlugins')->name('jobs.plugins.manage');
    Route::put('jobs/{job}/plugins', 'connectPlugins')->name('jobs.plugins.connect');
    Route::patch('jobs/{job}/plugins', 'updatePlugins')->name('jobs.plugins.update');
});
Route::resource('jobs', JobController::class);

// WARRANTY
Route::get('warranties/create/{work}', [WarrantyController::class, 'create'])->name('warranties.create');
Route::resource('warranties', WarrantyController::class)->except(['create','show']);

// WORK
Route::get('works/create/{client?}', [WorkController::class, 'create'])->name('works.create');
Route::get('works/{work}/warranties', [WorkController::class, 'warranties'])->name('works.warranties');
Route::resource('works', WorkController::class)->except('create');

// RESOURCES
Route::resources([
    'clients' => ClientController::class,
    'intermediaries' => IntermediaryController::class,
    'operators' => OperatorController::class,
    'skills' => SkillController::class,
    'users' => UserController::class,
]);
