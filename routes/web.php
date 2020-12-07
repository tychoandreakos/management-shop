<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\SpesificationItemController;
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
define("BRANDS", "brands");
define("SPECIFICATIONITEM", "specifications");

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
        Route::get('/create', [ItemController::class, 'create'])->name('.create');
        Route::post('/save', [ItemController::class, 'store'])->name('.store');
        Route::get('/list', [ItemController::class, 'indexList'])->name('.home_list');
        Route::delete('/delete/{id}', [ItemController::class, 'destroy'])->name('.delete');
        Route::get('/edit/{id}', [ItemController::class, 'edit'])->name('.edit');
        Route::patch('/update/{id}', [ItemController::class, 'update'])->name('.update');
    });
});

Route::prefix(BRANDS)->group(function () {
    Route::name(BRANDS)->group(function () {
        Route::get('/', [BrandController::class, 'index'])->name('.home');
        Route::get('/create', [BrandController::class, 'create'])->name('.create');
        Route::delete('/delete/{id}', [BrandController::class, 'destroy'])->name('.delete');
        Route::get('/edit/{id}', [BrandController::class, 'edit'])->name('.edit');
        Route::post('/save', [BrandController::class, 'store'])->name('.store');
        Route::patch('/update/{id}', [BrandController::class, 'update'])->name('.update');
    });
});

Route::prefix(SPECIFICATIONITEM)->group(function () {
    Route::name(SPECIFICATIONITEM)->group(function () {
        Route::get('/', [SpesificationItemController::class, 'index'])->name('.home');
        Route::get('/create', [SpesificationItemController::class, 'create'])->name('.create');
        Route::delete('/delete/{id}', [SpesificationItemController::class, 'destroy'])->name('.delete');
        Route::get('/edit/{id}', [SpesificationItemController::class, 'edit'])->name('.edit');
        Route::post('/save', [SpesificationItemController::class, 'store'])->name('.store');
        Route::patch('/update/{id}', [SpesificationItemController::class, 'update'])->name('.update');
    });
});


