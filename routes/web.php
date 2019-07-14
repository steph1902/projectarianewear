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
Route::delete('removecart', 'IndexController@removeCart')->name('removecart');
Route::get('precheckout','IndexController@preCheckoutPage');
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
Route::get('cost','IndexController@cost');

Route::get('/getcities','IndexController@getCities');
Route::get('/getpostalcode','IndexController@getpostalcode');
Route::get('/getshippingcost','IndexController@getshippingcost')->name('getshippingcost');

//
Route::post('toPayment','IndexController@toPayment')->name('toPayment'); //before payment, fill data, calculate shipping cost
Route::post('orderdetails','IndexController@orderDetails')->name('orderdetails');


Route::post('thankyou','IndexController@thankYou');
Route::post('notification/handler','IndexController@notificationHandler');

Route::get('thankyou','IndexController@thankyouPage');


// search
Route::get('searchresult','IndexController@searchProduct');

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
