<?php

use Illuminate\Support\Facades\Route;
use Modules\MasterUnit\Http\Controllers\HelperController;
use Modules\MasterUnit\Http\Controllers\MasterUnitController;

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

Route::prefix('master')->name('master.')->group(function () {
    Route::get('units/datatables', [HelperController::class, 'datatables'])->name('units.datatables');
    Route::get('units/select2', [HelperController::class, 'select2'])->name('units.select2');
    Route::resource('units', MasterUnitController::class);
});
