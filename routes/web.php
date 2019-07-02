<?php

use App\City;
use App\Province;


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
Route::post('addtocart/{url}','IndexController@addToCart')->name('addToCart');
Route::get('checkout','IndexController@checkoutPage');

Route::get('newarrival','IndexController@newArrival');
Route::get('bestseller','IndexController@bestSeller');
Route::get('musthaves','IndexController@mustHaves');

Route::get('top','IndexController@topProduct');
Route::get('dress','IndexController@dressProduct');
Route::get('outer','IndexController@outerProduct');
Route::get('jumpsuit','IndexController@jumpsuitProduct');
Route::get('set','IndexController@setProduct');

Route::get('aboutme','IndexController@aboutMe');

Route::get('testguzzle','IndexController@testGuzzle');
Route::get('rajaongkir','IndexController@rajaOngkir');


Route::get('/information/create/ajax-state',function()
{
       $province_id = Input::get('province');
       $cities = City::where('province_id','=',$province_id)->get();
       return $cities;
//     $state_id = Input::get('state_id');
//     $subcategories = City::where('state_id','=',$state_id)->get();
//     return $subcategories;

});


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
