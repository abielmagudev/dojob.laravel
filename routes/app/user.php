<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\CrewController;
use App\Http\Controllers\IntermediaryController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\OperatorController;
use App\Http\Controllers\PluginController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WarrantyController;
use App\Http\Controllers\WorkController;
use App\Http\Controllers\WorkJobPluginsController;
use Illuminate\Support\Facades\Route;


// CREW
Route::controller(CrewController::class)->group( function () {
    Route::put('crews/{crew}/members', 'updateMembers')->name('crews.members.update');
});
Route::resource('crews', CrewController::class);

// JOB
Route::controller(JobController::class)->group( function () {
    Route::put('jobs/{job}/plugins', 'connectPlugins')->name('jobs.plugins.connect');
    Route::patch('jobs/{job}/plugins', 'updatePlugins')->name('jobs.plugins.update');
});
Route::resource('jobs', JobController::class);

// WARRANTY
Route::get('warranties/create/{work}', [WarrantyController::class, 'create'])->name('warranties.create');
Route::resource('warranties', WarrantyController::class)->except(['create','show']);

// WORK
Route::controller(WorkController::class)->group( function () {
    Route::get('works/create/{client?}', 'create')->name('works.create');
    Route::get('works/{work}/warranties', 'warranties')->name('works.warranties');
});
Route::resource('works', WorkController::class)->except('create');

// RESOURCES
Route::resources([
    'clients' => ClientController::class,
    'intermediaries' => IntermediaryController::class,
    'members' => MemberController::class,
    'operators' => OperatorController::class,
    'skills' => SkillController::class,
    'users' => UserController::class,
]);

// API
Route::resource('plugins', PluginController::class)->except('create','show');

// Ajax
Route::get('work/job_id/plugins/action')->name('work_job_plugins.url');
Route::get('work/{job}/plugins/create', [WorkJobPluginsController::class, 'create'])->name('work_job_plugins.create');
Route::get('work/{job}/plugins/edit', [WorkJobPluginsController::class, 'edit'])->name('work_job_plugins.edit');
