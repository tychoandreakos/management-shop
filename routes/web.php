<?php

use App\Http\Controllers\CustomerController;
use Illuminate\Support\Facades\Route;

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

define("CUSTOMERS", "customers");

Route::get('/', function () {
    return view('welcome');
});

Route::prefix(CUSTOMERS)->group(function () {
    Route::name(CUSTOMERS)->group(function () {
        Route::get('/', [CustomerController::class, 'index'])->name('.home');
        Route::post('/save', [CustomerController::class, 'store'])->name('.store');
    });
});

