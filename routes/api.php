<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\RimplenetController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('jwt.verify')->get('/', function() {
    $data = [
        'message' => "Welcome to our API"
    ];
    return response()->json($data, 200);
});

Route::post('token', [AuthController::class, 'token']);
Route::post('logout', [AuthController::class, 'logout']);
Route::post('refresh', [AuthController::class, 'refresh']);

Route::middleware('jwt.verify')->get('/me', [AuthController::class, 'getUser']);

Route::controller(RimplenetController::class)->name('api.rimplenet.')->middleware('jwt.verify')->group(function () {
    Route::post('user-login', 'apiLoginUser')->name('user-login');
    Route::post('user-register', 'apiRegisterUser')->name('user-register');

    Route::post('create-wallet','apiCreateWallet')->name('create-wallet');
    Route::post('create-credit','apiCreateCredit')->name('create-credit');
    Route::post('create-debit','apiCreateDebit')->name('create-debit');
    Route::post('create-transfer','apiCreateTransfer')->name('create-transfer');
});

// Wave::api();
