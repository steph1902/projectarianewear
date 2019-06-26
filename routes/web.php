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

Route::get('/','IndexController@frontPage');

// Route::get('/', function ()
// {
//     return view('welcome');
// });

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


//Frontend
Route::get('index','IndexController@indexView');
Route::get('productlist', 'IndexController@productListView');
Route::get('productdetail/{url}','IndexController@productDetailView');
Route::get('cart','IndexController@cart');
Route::get('addtocart/{url}','IndexController@addToCart');


/**
 * to insert url slug
 */
// Route::get('urlslug','IndexController@insertUrl');


//backend
Route::get('backendindex','BackendController@getBackIndexPageView');
/*
	Products
*/
Route::get('addproduct','ProductsController@create');
Route::post('addproduct','ProductsController@store');
