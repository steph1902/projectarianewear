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

Route::get('home', 'HomeController@index')->name('home')->middleware('auth');
Route::get('logout-user','IndexController@logoutUser');

//Frontend
Route::get('index','IndexController@indexView');
Route::get('product-list', 'IndexController@productListView');
Route::get('product-detail/{url}','IndexController@productDetailView');
Route::get('cart','IndexController@cart');
Route::post('add-to-cart/{url}','IndexController@addToCart')->name('addToCart');
Route::delete('remove-cart', 'IndexController@removeCart')->name('removecart');
Route::get('pre-checkout','IndexController@preCheckoutPage');
Route::get('checkout','IndexController@checkoutPage');

Route::get('discount','DiscountsController@index')->name('discount');

Route::get('new-arrival','IndexController@newArrival');
Route::get('best-seller','IndexController@bestSeller');
Route::get('must-haves','IndexController@mustHaves');


Route::get('top','IndexController@topProduct');
Route::get('dress','IndexController@dressProduct');
Route::get('outer','IndexController@outerProduct');
Route::get('jumpsuit','IndexController@jumpsuitProduct');
Route::get('set','IndexController@setProduct');

Route::get('about-me','IndexController@aboutMe');

Route::get('testguzzle','IndexController@testGuzzle');
Route::get('rajaongkir','IndexController@rajaOngkir');
Route::get('cost','IndexController@cost');

Route::get('/getcities','IndexController@getCities');
Route::get('/getpostalcode','IndexController@getpostalcode');
Route::get('/getshippingcost','IndexController@getshippingcost')->name('getshippingcost');

//
// Route::get('pre-checkout','IndexController@preCheckoutPage');
// Route::get('checkout','IndexController@checkoutPage');

Route::get('checkCoupon','IndexController@checkCoupon');
Route::post('toPayment','IndexController@toPayment')->name('toPayment'); //before payment, fill data, calculate shipping cost
Route::post('orderdetails','IndexController@orderDetails')->name('orderdetails');


Route::post('thank-you','IndexController@thankYou');
Route::post('notification/handler','IndexController@notificationHandler');

Route::get('thank-you','IndexController@thankyouPage');


// search
Route::get('searchresult','IndexController@searchProduct');

/**
 * to insert url slug
 */
// Route::get('urlslug','IndexController@insertUrl');
Route::get('urlslug','IndexController@insertURLProducts');


// newsletter
Route::post('newsletter','NewsletterController@store');


// customer login logic start here
// Route::get('home','SpecialController@customerOrder')->middleware('auth');



//backend
// sitemap
// Route::get('ariane-admin-backend-sitemap','BackendController@getSitemapView')->name('sitemap')->middleware('auth');
Route::get('ariane-admin-backend-sitemap','BackendController@getSitemapView')->name('sitemap')->middleware('auth');

// Route::get('ariane-admin-backend-index','BackendController@getBackIndexPageView');
//backend product
Route::get('ariane-admin-backend-add-product','BackendController@getBackAddProductView')->name('add-product')->middleware('ariane');
Route::post('ariane-admin-backend-add-product','BackendController@backendPostProduct')->name('add-product');

// step 2 upload product images
// Route::get('ariane-admin-backend-upload-photos','BackendController@backendUploadView');
// Route::post('ariane-admin-backend-upload-photos','BackendController@backendPostImages');

//login dashboard page
Route::get('ariane-admin-backend-login','BackendController@getBackLoginView')->name('ariane-admin-login');
Route::post('ariane-admin-backend-login','BackendController@getBackPostLogin');
//logout
Route::get('ariane-admin-backend-logout','BackendController@backendLogout')->name('backend-logout');

Route::get('ariane-admin-backend-product-view','BackendController@getBackProductView')->name('view-product')->middleware('ariane');
// update
Route::get('ariane-admin-backend-edit-product-view/{url}','BackendController@getBackEditProductView')->name('edit-product')->middleware('ariane');
Route::post('ariane-admin-backend-edit-product','BackendController@backendEditProduct')->name('backendeditproduct');

// COUPONS
Route::get('ariane-admin-backend-view-coupons','BackendController@getBackCouponView')->name('view-coupon')->middleware('ariane');
// add coupon
Route::get('ariane-admin-backend-add-coupon','BackendController@getBackPostCouponView')->name('add-coupon')->middleware('ariane');
Route::post('ariane-admin-backend-add-coupon','BackendController@getBackPostCoupon')->name('post-coupon')->middleware('ariane');
// edit coupon
Route::get('ariane-admin-backend-edit-coupon-view/{id}','BackendController@getBackEditCouponView')->name('edit-coupon')->middleware('ariane');
Route::post('ariane-admin-backend-edit-coupon','BackendController@backendEditCoupon');
// delete coupon
Route::get('ariane-admin-backend-delete-coupon/{id}', 'BackendController@deleteCoupon');

// billling details admin dashboard
Route::get('ariane-admin-backend-view-billing','BackendController@getBillingView')->name('view-billing');

// discount
Route::get('ariane-admin-backend-view-product-discount','BackendController@getBackDiscountView')->name('view-discount')->middleware('auth');
//add discount
Route::get('ariane-admin-backend-edit-discount/{id}','BackendController@setDiscountView');
Route::post('ariane-admin-backend-edit-discount/{id}','BackendController@setDiscount');
// edit discount
// Route::get();
// Route::post();

// redesigning product detail
// Route::get('productdetailtest/{url}','IndexController@productDetailViewtest');

// test email
Route::get('test-send-email','IndexController@testEmail');


// checkpoint
// benerin di product detail


/*
	Products
*/
Route::get('addproduct','ProductsController@create');
Route::post('addproduct','ProductsController@store');





Route::get('clear-cache', function() {
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('view:clear');
    return "Cache is cleared";
});
