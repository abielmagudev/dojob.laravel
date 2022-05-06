<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\OperatorController;
use App\Http\Controllers\CrewController;

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
    Route::match(['put','patch'], '/', [CrewController::class, 'manned'])->name('crews.operators.update');
});

Route::resources([
    'clients' => ClientController::class,
    'crews' => CrewController::class,
    'jobs' => JobController::class,
    'operators' => OperatorController::class,
]);
