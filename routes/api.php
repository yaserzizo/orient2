<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/products','Products\ProductController@listapi');
Route::get('/categories','Products\CategoryController@listapi');
Route::get('/subcategories','Products\SubCategoryController@listapi');
Route::get('/brands','Products\BrandController@listapi');
Route::get('/category','Products\BrandController@listapi');
Route::post('/product', 'Products\ProductController@apiCreate');
Route::post('/category', 'Products\CategoryController@apiCreate');
Route::post('/subcategory', 'Products\SubCategoryController@apiCreate');
Route::post('/brand', 'Products\BrandController@apiCreate');
Route::get('/suppliers','Suppliers\SupplierController@listapi');
Route::post('/supplier', 'Suppliers\SupplierController@apiCreate');
//Route::get('/product/{id}', 'Products\ProductController@apiShow');

