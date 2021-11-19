<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\CartController;
use App\Http\Controllers\EditorController;
use App\Http\Controllers\paymentController;
use App\Http\Controllers\FirebaseController;
use App\Http\Controllers\User\AuthController;
use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\User\SearchController;
use App\Http\Controllers\User\CouponsController;
use App\Http\Controllers\User\OrderController;
use App\Http\Controllers\User\ReviewsController;
use App\Http\Controllers\User\WishlistController;
use App\Http\Controllers\User\SocialiteController;
use App\Http\Controllers\User\VerificationController;
use App\Http\Controllers\User\SocialShareButtonsController;

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
/* Route::get('artisan', function () {
  //dd(exec('php artisan migrate --path=database\migration\2021_11_09_144205_add_type_to_orders_table.php'));
  Artisan::call('migrate --path=/database/migrations/2021_11_09_144205_add_type_to_orders_table.php') ;
}); */

Route::post('sendSMSCode', [VerificationController::class , 'sendSMSCode'])->name('sendSMSCode');
Route::post('verifySMSCode', ['uses' => 'VerificationController@verifySMSCode']);
//Route::group(['prefix' => 'user'], function () {

    Route::get('login', [AuthController::class, 'login'])->name('login');
    Route::post('login', [AuthController::class, 'auth']);
    Route::post('logout', [AuthController::class, 'logout'])->name('user.logout');
    Route::post('registerValidateURL', [AuthController::class, 'registerValidateURL'])->name('user.registerValidate');

// Route::group([
//     'prefix' => LaravelLocalization::setLocale(),
// 	'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
// ], function() {


    Route::get('/',[HomeController::class,'index'])->name('user');
    Route::get('user/categories',[HomeController::class,'category'])->name('user.categories');
    Route::get('user/products/',[HomeController::class,'product']);
    Route::get('shopping/{id}',[HomeController::class,'shopping'])->name('shopping');
    Route::post('review',[ReviewsController::class,'store'])->name('stroe.review');
    Route::get('arrival',[HomeController::class,'arrival'])->name('arrival');
    Route::get('aboutUs',[HomeController::class,'aboutUs'])->name('aboutUs');
    Route::get('contact',[HomeController::class,'contact'])->name('contact');
    Route::get('view-category/{slug_ar}',[HomeController::class,'viewcategory'])->name('category.detalis');
    Route::get('category/{slug_ar}/{prod_slug_ar}',[HomeController::class,'productview']);
    Route::get('cart',[CartController::class,'index'])->name('cart');
    Route::post('add-cart',[CartController::class,'addcart'])->name('add-cart');
    Route::post('update-cart',[CartController::class,'update'])->name('update-cart');
    Route::delete('delete-cart/{id}',[CartController::class,'delete'])->name('delete-cart');
    Route::post('apply-coupon',[CouponsController::class,'discount'])->name('apply-coupon');
    Route::delete('delete-coupon',[CouponsController::class,'delete'])->name('delete-coupon');
    Route::get('more-product',[HomeController::class,'moreProduct'])->name('moreProduct');
    Route::get('wishlist',[WishlistController::class, 'index'])->name('wishlist.index');
    Route::post('wishlist',[WishlistController::class, 'store'])->name('wishlist.store');
    Route::post('wishlist/add-cart',[WishlistController::class, 'addcart'])->name('wishlist.addcart');
    Route::delete('wishlist',[WishlistController::class, 'destroy'])->name('wishlist.delete');
    Route::get('/social-media-share', [SocialShareButtonsController::class,'ShareWidget']);
    Route::get('orders',[OrderController::class,'index'])->name('order.index');
    Route::get('import-excel',[HomeController::class,'viewImport'])->name('view.import');
    Route::post('import-excel',[HomeController::class,'import'])->name('excel.import');
        

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

Route::post('payment',[paymentController::class,'pay'])->name('payment');
Route::get('payment/success/{referance_id}',[paymentController::class,'success'])->name('payment.success');
Route::get('payment/cancel/{referance_id}',[paymentController::class,'cancel'])->name('payment.cancel');

// ------------------------for switch between languages-------------------------
Route::get('lang/{lang}', ['as' => 'lang.switch', 'uses' => 'App\Http\Controllers\LanguageController@switchLang']);
Route::get('user/search',[SearchController::class,'search'])->name('user.search');
