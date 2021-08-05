<?php

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

Auth::routes();

Route::get('/', 'App\HTTP\Controllers\HomeController@index')->name('home')->middleware('auth');

Route::group(['middleware' => 'auth'], function () {

    Route::resources([
        'users' => 'App\HTTP\Controllers\UserController',
        'providers' => 'App\HTTP\Controllers\ProviderController',
        'inventory/products' => 'App\HTTP\Controllers\ProductController',
        'clients' => 'App\HTTP\Controllers\ClientController',
        'inventory/categories' => 'App\HTTP\Controllers\ProductCategoryController',
        'transactions/transfer' => 'App\HTTP\Controllers\TransferController',
        'methods' => 'App\HTTP\Controllers\MethodController',
    ]);
    
    Route::resource('transactions', 'App\HTTP\Controllers\TransactionController')->except(['create', 'show']);
    Route::get('transactions/stats/{year?}/{month?}/{day?}', ['as' => 'transactions.stats', 'uses' => 'App\HTTP\Controllers\TransactionController@stats']);
    Route::get('transactions/{type}', ['as' => 'transactions.type', 'uses' => 'App\HTTP\Controllers\TransactionController@type']);
    Route::get('transactions/{type}/create', ['as' => 'transactions.create', 'uses' => 'App\HTTP\Controllers\TransactionController@create']);
    Route::get('transactions/{transaction}/edit', ['as' => 'transactions.edit', 'uses' => 'App\HTTP\Controllers\TransactionController@edit']);

    Route::get('inventory/stats/{year?}/{month?}/{day?}', ['as' => 'inventory.stats', 'uses' => 'App\HTTP\Controllers\InventoryController@stats']);
    Route::resource('inventory/receipts', 'App\HTTP\Controllers\ReceiptController')->except(['edit', 'update']);
    Route::get('inventory/receipts/{receipt}/finalize', ['as' => 'receipts.finalize', 'uses' => 'App\HTTP\Controllers\ReceiptController@finalize']);
    Route::get('inventory/receipts/{receipt}/product/add', ['as' => 'receipts.product.add', 'uses' => 'App\HTTP\Controllers\ReceiptController@addproduct']);
    Route::get('inventory/receipts/{receipt}/product/{receivedproduct}/edit', ['as' => 'receipts.product.edit', 'uses' => 'App\HTTP\Controllers\ReceiptController@editproduct']);
    Route::post('inventory/receipts/{receipt}/product', ['as' => 'receipts.product.store', 'uses' => 'App\HTTP\Controllers\ReceiptController@storeproduct']);
    Route::match(['put', 'patch'], 'inventory/receipts/{receipt}/product/{receivedproduct}', ['as' => 'receipts.product.update', 'uses' => 'App\HTTP\Controllers\ReceiptController@updateproduct']);
    Route::delete('inventory/receipts/{receipt}/product/{receivedproduct}', ['as' => 'receipts.product.destroy', 'uses' => 'App\HTTP\Controllers\ReceiptController@destroyproduct']);

    Route::resource('sales', 'App\HTTP\Controllers\SaleController')->except(['edit', 'update']);
    Route::get('sales/{sale}/finalize', ['as' => 'sales.finalize', 'uses' => 'App\HTTP\Controllers\SaleController@finalize']);
    Route::get('sales/{sale}/product/add', ['as' => 'sales.product.add', 'uses' => 'App\HTTP\Controllers\SaleController@addproduct']);
    Route::get('sales/{sale}/product/{soldproduct}/edit', ['as' => 'sales.product.edit', 'uses' => 'App\HTTP\Controllers\SaleController@editproduct']);
    Route::post('sales/{sale}/product', ['as' => 'sales.product.store', 'uses' => 'App\HTTP\Controllers\SaleController@storeproduct']);
    Route::match(['put', 'patch'], 'sales/{sale}/product/{soldproduct}', ['as' => 'sales.product.update', 'uses' => 'App\HTTP\Controllers\SaleController@updateproduct']);
    Route::delete('sales/{sale}/product/{soldproduct}', ['as' => 'sales.product.destroy', 'uses' => 'App\HTTP\Controllers\SaleController@destroyproduct']);

    Route::get('clients/{client}/transactions/add', ['as' => 'clients.transactions.add', 'uses' => 'App\HTTP\Controllers\ClientController@addtransaction']);

    Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\HTTP\Controllers\ProfileController@edit']);
    Route::match(['put', 'patch'], 'profile', ['as' => 'profile.update', 'uses' => 'App\HTTP\Controllers\ProfileController@update']);
    Route::match(['put', 'patch'], 'profile/password', ['as' => 'profile.password', 'uses' => 'App\HTTP\Controllers\ProfileController@password']);
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('icons', ['as' => 'pages.icons', 'uses' => 'App\HTTP\Controllers\PageController@icons']);
    Route::get('notifications', ['as' => 'pages.notifications', 'uses' => 'App\HTTP\Controllers\PageController@notifications']);
    Route::get('tables', ['as' => 'pages.tables', 'uses' => 'App\HTTP\Controllers\PageController@tables']);
    Route::get('typography', ['as' => 'pages.typography', 'uses' => 'App\HTTP\Controllers\PageController@typography']);
});
