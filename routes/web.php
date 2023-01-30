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

Route::get('testing', [PortainerController::class, 'createWPContainer']);

// Authentication routes
Auth::routes();

// Voyager Admin routes
Route::group(['prefix' => config('voyager.prefix', 'admin')], function () {
    Voyager::routes();
});

// Wave routes
Wave::routes();

Route::controller(RimplenetController::class)->name('rimplenet.')->middleware('wave')->group(function () {
    Route::view('users', 'theme::dashboard.users')->name('users');
    Route::view('wallets','theme::dashboard.wallets')->name('wallets');
    Route::view('transactions','theme::dashboard.transactions')->name('transactions');
});
