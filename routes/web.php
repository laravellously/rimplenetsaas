<?php

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

use App\Http\Controllers\PortainerController;
use App\Http\Controllers\RimplenetController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use TCG\Voyager\Facades\Voyager;
use Wave\Facades\Wave;

// Authentication routes
Auth::routes();

// Voyager Admin routes
Route::group(['prefix' => config('voyager.prefix', 'admin')], function () {
    Voyager::routes();
});

// Wave routes
Wave::routes();

// Voyager Admin routes
Route::group(['name' => 'rimplenet.*'], function () {
    Route::view('users','wave.dashboard.users')->name('users');
});


Route::get('rimplenet', [RimplenetController::class, 'create'])->name('rimplenet');
Route::get('portainer', [PortainerController::class, 'createWPContainer'])->name('portainer');


Route::get('site', [RimplenetController::class, 'test']);
