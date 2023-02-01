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

Route::middleware('wave')->name('rimplenet.')->group(function () {
    Route::view('users', 'theme::dashboard.users')->name('users');
    Route::view('wallets','theme::dashboard.wallets')->name('wallets');
    Route::view('credits','theme::dashboard.transactions')->name('credits');
    Route::view('debits','theme::dashboard.transactions')->name('debits');
    Route::view('transfers','theme::dashboard.transactions')->name('transfers');
});
