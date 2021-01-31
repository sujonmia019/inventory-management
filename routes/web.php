<?php

use App\Http\Controllers\AjaxController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\UnitsController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['register' => false]);

Route::get('/', [HomeController::class, 'index'])->name('home')->middleware('auth');

// Route Grouping
Route::group(['middleware' => 'auth'], function () {

    // Supplier
    Route::resource('supplier', SupplierController::class);
    // Customer
    Route::resource('customer', CustomerController::class);
    // Units
    Route::resource('units', UnitsController::class);
    // Category
    Route::resource('category', CategoryController::class);
    // Product
    Route::resource('product', ProductController::class);
    // Purchase
    Route::resource('purchase', PurchaseController::class);
    Route::get('purchase/approve/{id}', [PurchaseController::class,'purchaseApprove'])->name('purchase.approved');
    // Ajax Category
    Route::get('categorys', [AjaxController::class,'getCategory'])->name('categories');
    // Ajax Category
    Route::get('products', [AjaxController::class,'getProduct'])->name('products');

});
