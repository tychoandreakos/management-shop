<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\SpesificationItemController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ShipProviderController;
use App\Http\Controllers\CustomerLabelController;
use App\Http\Controllers\ItemTransactionController;
use App\Http\Controllers\CustomerTransactionController;
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
define("CATEGORIES", "categories");
define('SHIPPINGPROVIDERS', "shipping-providers");
define('CUSTOMERLABEL', "customer-labels");
define('MASTER', "master");

define('ITEMTRANSACTION', 'products');
define('CUSTOMERTRANSACTION', 'orderings');

Route::get('/login', function () {
    return view('auth.login');
})->name('login');
Route::get('/re', function () {
    return view('auth.register');
});

Route::middleware('auth')->group(function () {
    Route::get('/', function () {
        return redirect()->route('dashboard');
    });
    Route::get('/home', [DashboardController::class, 'index'])->name('dashboard');
    Route::prefix(MASTER)->group(function () {
        Route::prefix(CUSTOMERS)->group(function () {
            Route::name(CUSTOMERS)->group(function () {
                Route::get('/', [CustomerController::class, 'index'])->name('.home');
                Route::post('/save', [CustomerController::class, 'store'])->name('.store');
                Route::delete('/delete/{id}', [CustomerController::class, 'destroy'])->name('.delete');
                Route::get('/detail/{id}', [CustomerController::class, 'detail'])->name('.detail');
                Route::patch('/update/{id}', [CustomerController::class, 'update'])->name('.update');
                Route::post('search', [CustomerController::class, 'search'])->name(".search");
                Route::get('/autocomplete', [CustomerController::class, 'autocomplete'])->name('.autocomplete');
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
                Route::get('/autocomplete', [ItemController::class, 'autocomplete'])->name('.autocomplete');
                Route::get('/autocomplete-with-specification', [ItemController::class, 'autocompleteWithSpesification'])->name('.autocompleteWSpec');
                Route::post('/post-image', [ItemController::class, 'storeImage'])->name('.store_image');
                Route::get('/list', [ItemController::class, 'list'])->name('.list');
                Route::get('/grid', [ItemController::class, 'grid'])->name('.grid');
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
                Route::get('/autocomplete', [BrandController::class, 'autocomplete'])->name('.autocomplete');
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


        Route::prefix(CATEGORIES)->group(function () {
            Route::name(CATEGORIES)->group(function () {
                Route::get('/', [CategoryController::class, 'index'])->name('.home');
                Route::get('/create', [CategoryController::class, 'create'])->name('.create');
                Route::delete('/delete/{id}', [CategoryController::class, 'destroy'])->name('.delete');
                Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('.edit');
                Route::post('/save', [CategoryController::class, 'store'])->name('.store');
                Route::patch('/update/{id}', [CategoryController::class, 'update'])->name('.update');
            });
        });

        Route::prefix(SHIPPINGPROVIDERS)->group(function () {
            Route::name(SHIPPINGPROVIDERS)->group(function () {
                Route::get('/', [ShipProviderController::class, 'index'])->name('.home');
                Route::get('/create', [ShipProviderController::class, 'create'])->name('.create');
                Route::delete('/delete/{id}', [ShipProviderController::class, 'destroy'])->name('.delete');
                Route::get('/edit/{id}', [ShipProviderController::class, 'edit'])->name('.edit');
                Route::post('/save', [ShipProviderController::class, 'store'])->name('.store');
                Route::patch('/update/{id}', [ShipProviderController::class, 'update'])->name('.update');
            });
        });


        Route::prefix(CUSTOMERLABEL)->group(function () {
            Route::name(CUSTOMERLABEL)->group(function () {
                Route::get('/', [CustomerLabelController::class, 'index'])->name('.home');
                Route::get('/create', [CustomerLabelController::class, 'create'])->name('.create');
                Route::delete('/delete/{id}', [CustomerLabelController::class, 'destroy'])->name('.delete');
                Route::get('/edit/{id}', [CustomerLabelController::class, 'edit'])->name('.edit');
                Route::post('/save', [CustomerLabelController::class, 'store'])->name('.store');
                Route::patch('/update/{id}', [CustomerLabelController::class, 'update'])->name('.update');
            });
        });
    });
    Route::prefix(ITEMTRANSACTION)->group(function () {
        Route::name(ITEMTRANSACTION)->group(function () {
            Route::get('/', [ItemTransactionController::class, 'index'])->name('.home');
            Route::get('/create', [ItemTransactionController::class, 'create'])->name('.create');
            Route::post('/save', [ItemTransactionController::class, 'store'])->name('.store');
            Route::delete('/delete/{id}', [ItemTransactionController::class, 'destroy'])->name('.delete');
            Route::get('/edit/{id}', [ItemTransactionController::class, 'edit'])->name('.edit');
            Route::patch('/update/{id}', [ItemTransactionController::class, 'update'])->name('.update');
            Route::get('/autocomplete', [ItemTransactionController::class, 'autocomplete'])->name('.autocomplete');
        });
    });
    Route::prefix(CUSTOMERTRANSACTION)->group(function () {
        Route::name(CUSTOMERTRANSACTION)->group(function () {
            Route::get('/', [CustomerTransactionController::class, 'index'])->name('.home');
            Route::get('/create', [CustomerTransactionController::class, 'create'])->name('.create');
            Route::post('/save', [CustomerTransactionController::class, 'store'])->name('.store');
            Route::delete('/delete/{id}', [CustomerTransactionController::class, 'destroy'])->name('.delete');
            Route::get('/edit/{id}', [CustomerTransactionController::class, 'edit'])->name('.edit');
            Route::patch('/update/{id}', [CustomerTransactionController::class, 'update'])->name('.update');
        });
    });
});
