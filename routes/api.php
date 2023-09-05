<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Transaction;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('login', [AuthController::class, 'signin']);
Route::post('register', [AuthController::class, 'signup']);

Route::middleware('auth:sanctum')->group( function () {
    Route::patch('transactions/{transaction}', Transaction\UpdateController::class);
    Route::get('transactions', Transaction\IndexController::class);
    Route::post('transactions', Transaction\StoreController::class);
});


