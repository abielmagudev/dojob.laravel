<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\OperatorController;
use App\Http\Controllers\CrewController;
use App\Http\Controllers\WarrantyController;
use App\Http\Controllers\WorkController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('crews/{crew}/operators')->group(function () {
    Route::get('/', [CrewController::class, 'operators'])->name('crews.operators');
    Route::match(['put','patch'], '/', [CrewController::class, 'addOperators'])->name('crews.operators.update');
});

Route::get('works/create/{client?}', [WorkController::class, 'create'])->name('works.create');
Route::get('works/{work}/warranties', [WorkController::class, 'warranties'])->name('works.warranties');
Route::resource('works', WorkController::class)->except('create');

Route::get('warranties/create/{work}', [WarrantyController::class, 'create'])->name('warranties.create');
Route::resource('warranties', WarrantyController::class)->except(['create','show']);

Route::resources([
    'clients' => ClientController::class,
    'crews' => CrewController::class,
    'jobs' => JobController::class,
    'operators' => OperatorController::class,
]);
