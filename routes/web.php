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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


//Frontend
Route::get('index','IndexController@indexView');
Route::get('productdetail','IndexController@productDetailView');


//backend
Route::get('backendindex','BackendController@getBackIndexPageView');
/*
	Products
*/
Route::get('addproduct','ProductsController@create');
Route::post('addproduct','ProductsController@store');
