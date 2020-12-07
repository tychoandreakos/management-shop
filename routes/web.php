<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ItemController;
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
define("ITEMS", "items");

Route::get('/', function () {
    return view('welcome');
});

Route::prefix(CUSTOMERS)->group(function () {
    Route::name(CUSTOMERS)->group(function () {
        Route::get('/', [CustomerController::class, 'index'])->name('.home');
        Route::post('/save', [CustomerController::class, 'store'])->name('.store');
        Route::delete('/delete/{id}', [CustomerController::class, 'destroy'])->name('.delete');
        Route::get('/detail/{id}', [CustomerController::class, 'detail'])->name('.detail');
        Route::patch('/update/{id}', [CustomerController::class, 'update'])->name('.update');
        Route::post('search', [CustomerController::class, 'search'])->name(".search");
    });
});

Route::prefix(ITEMS)->group(function () {
    Route::name(ITEMS)->group(function () {
        Route::get('/', [ItemController::class, 'index'])->name('.home');
    });
});

