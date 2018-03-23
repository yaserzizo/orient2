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

Route::get('/', function () {
    return view('welcome');
});
Route::group(['middleware' => ['web']], function () {
    Auth::routes();

    Route::get('/home', 'HomeController@index')->name('home');

    Auth::routes();


    Route::resource('/products', 'Products\ProductController');
    Route::resource('/categories', 'Products\CategoryController');
    Route::resource('/subcategories', 'Products\SubCategoryController');
    Route::resource('/brands', 'Products\BrandController');
    Route::resource('/suppliers', 'Suppliers\SupplierController');
});