<?php

use App\Http\Controllers\EditorController;
use App\Http\Controllers\FirebaseController;
use App\Http\Controllers\paymentController;
use App\Http\Controllers\User\SocialiteController;
use App\Http\Controllers\User\AuthController;
use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\User\VerificationController;
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

Route::post('sendSMSCode', [VerificationController::class , 'sendSMSCode'])->name('sendSMSCode');
Route::post('verifySMSCode', ['uses' => 'VerificationController@verifySMSCode']);
//Route::group(['prefix' => 'user'], function () {

    Route::get('login', [AuthController::class, 'login'])->name('login');
    Route::post('login', [AuthController::class, 'auth']);
 
Route::get('/',[HomeController::class,'index'])->name('user');
Route::get('user/categories',[HomeController::class,'category']);
Route::get('user/products/',[HomeController::class,'product']);
Route::get('shopping',[HomeController::class,'shopping'])->name('shopping');
Route::get('arrival',[HomeController::class,'arrival'])->name('arrival');
Route::get('cart',[HomeController::class,'cart'])->name('cart');
Route::get('aboutUs',[HomeController::class,'aboutUs'])->name('aboutUs');
Route::get('contact',[HomeController::class,'contact'])->name('contact');
Route::get('view-category/{slug_ar}',[HomeController::class,'viewcategory']);
Route::get('auth/google', [SocialiteController::class, 'redirectToGoogle'])->name('login.google');
Route::get('callback/google', [SocialiteController::class, 'handleCallback']);
Route::get('category/{slug_ar}/{prod_slug_ar}',[HomeController::class,'productview']);

//--------------------------editor---------------------------
Route::get('editor',[EditorController::class,'editor']);

 Route::get('auth/twitter', [SocialiteController::class, 'redirectToTW'])->name('login.twitter');
Route::get('callback/twitter', [SocialiteController::class, 'handleCallbackTW']);

//FireBase Mobile OTP Uth
Route::get('firebase-auth',[FirebaseController::class,'index']);
Route::get('pay',[paymentController::class,'pay']);