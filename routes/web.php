<?php

use App\Http\Controllers\Employee;
use App\Http\Controllers\Transaction;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::middleware('auth')->group(function(){
    Route::get('/home', Employee\IndexController::class)->name('home');
    Route::post('/home', Transaction\StoreController::class)->name('transactions.store');
    Route::patch('/transactions/{transaction}', Transaction\UpdateController::class)->name('transactions.update');
    Route::get('/transactions', Transaction\IndexController::class)->name('transactions.index');
});


Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
