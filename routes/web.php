<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\EditorController;
use App\Http\Controllers\FirebaseController;
use App\Http\Controllers\paymentController;
use App\Http\Controllers\User\SocialiteController;
use App\Http\Controllers\User\AuthController;
use App\Http\Controllers\User\CouponsController;
use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\User\VerificationController;
use App\Http\Controllers\User\WishlistController;
use Illuminate\Support\Facades\Route;

// use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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

Route::post('sendSMSCode', [VerificationController::class , 'sendSMSCode'])->name('sendSMSCode');
Route::post('verifySMSCode', ['uses' => 'VerificationController@verifySMSCode']);
//Route::group(['prefix' => 'user'], function () {

    Route::get('login', [AuthController::class, 'login'])->name('login');
    Route::post('login', [AuthController::class, 'auth']);

// Route::group([
//     'prefix' => LaravelLocalization::setLocale(),
// 	'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
// ], function() {


    Route::get('/',[HomeController::class,'index'])->name('user');
    Route::get('user/categories',[HomeController::class,'category'])->name('user.categories');
    Route::get('user/products/',[HomeController::class,'product']);
    Route::get('shopping/{id}',[HomeController::class,'shopping'])->name('shopping');
    Route::get('arrival',[HomeController::class,'arrival'])->name('arrival');
    Route::get('aboutUs',[HomeController::class,'aboutUs'])->name('aboutUs');
    Route::get('contact',[HomeController::class,'contact'])->name('contact');
    Route::get('view-category/{slug_ar}',[HomeController::class,'viewcategory'])->name('category.detalis');
    Route::get('category/{slug_ar}/{prod_slug_ar}',[HomeController::class,'productview']);
    Route::get('cart',[CartController::class,'index'])->name('cart');
    Route::post('add-cart',[CartController::class,'addcart'])->name('add-cart');
    Route::delete('delete-cart/{id}',[CartController::class,'delete'])->name('delete-cart');
    Route::post('apply-coupon',[CouponsController::class,'discount'])->name('apply-coupon');
    Route::delete('delete-coupon',[CouponsController::class,'delete'])->name('delete-coupon');
    Route::get('more-product',[HomeController::class,'moreProduct'])->name('moreProduct');
    Route::get('wishlist',[WishlistController::class, 'index'])->name('wishlist.index');
    Route::post('wishlist',[WishlistController::class, 'store'])->name('wishlist.store');
// });
//--------------------------editor---------------------------
Route::get('editor',[EditorController::class,'editor']);


Route::get('auth/google', [SocialiteController::class, 'redirectToGoogle'])->name('login.google');
Route::get('callback/google', [SocialiteController::class, 'handleCallback']);
Route::get('auth/twitter', [SocialiteController::class, 'redirectToTW'])->name('login.twitter');
Route::get('callback/twitter', [SocialiteController::class, 'handleCallbackTW']);

//FireBase Mobile OTP Uth
Route::get('firebase-auth',[FirebaseController::class,'index']);


//-----------------------------------------Payment GateWay----------------------------------

Route::get('payment',[paymentController::class,'pay'])->name('payment');
Route::get('payment/success',[paymentController::class,'success'])->name('payment.success');
Route::get('payment/cancel',[paymentController::class,'cancel'])->name('payment.cancel');

// ------------------------for switch between languages-------------------------
Route::get('lang/{lang}', ['as' => 'lang.switch', 'uses' => 'App\Http\Controllers\LanguageController@switchLang']);
