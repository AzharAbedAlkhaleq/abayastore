<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Admin\ColorController;
use App\Http\Controllers\Admin\CouponController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\EmailController;
use App\Http\Controllers\Admin\HomeCategoriesController;
use App\Http\Controllers\Admin\Homeslider;
use App\Http\Controllers\Admin\ProductsController;
use App\Http\Controllers\Admin\SizesController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'Lang'], function () {

    Route::group(['prefix' => 'admin'], function () {

        Route::get('login', [AuthController::class, 'login'])->name('auth.login-view');
        Route::post('login', [AuthController::class, 'auth']);

        Route::group(['middleware' => 'admin:admin'], function () {

            Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
        // Route::get('/email',[EmailController::class,'index']);
        
        //---------------------------------------------Products-----------------------------------------
        
            Route::get('categories',[CategoriesController::class,'index'])->name('categories');
            
            //Add Category
            Route::get('add-category',[CategoriesController::class,'create'])->name('add-category');
            Route::post('store-category',[CategoriesController::class,'store'])->name('store-category');
           
            //Update Category
            Route::get('edit-category/{id}',[CategoriesController::class,'edit'])->name('edit-category');
            Route::put('update-category',[CategoriesController::class,'update'])->name('update-category');
            
            //search Category
            Route::get('search',[CategoriesController::class,'search'])->name('search');
            
            //Delete Category
            Route::delete('delete-category/{id}',[CategoriesController::class,'delete'])->name('delete-category');

             //------------------------------Sizes--------------------------------------------------
         Route::get('sizes',[SizesController::class,'index'])->name('sizes');
            
         //Add size
         Route::get('add-size',[SizesController::class,'create'])->name('add-size');
         Route::post('store-size',[SizesController::class,'store'])->name('store-size');

         //update size
         Route::get('edit-size/{id}',[SizesController::class,'edit'])->name('edit-size');
         Route::put('update-size/{id}',[SizesController::class,'update'])->name('update-size');
         
         //Delete size
             Route::delete('delete-size/{id}',[SizesController::class,'delete']);     

             //------------------------------Colors--------------------------------------------------
             Route::get('colors',[ColorController::class,'index'])->name('colors');
            
             //Add color
             Route::get('add-color',[ColorController::class,'create'])->name('add-color');
             Route::post('store-color',[ColorController::class,'store'])->name('store-color');
    
             //update color
             Route::get('edit-color/{id}',[ColorController::class,'edit'])->name('edit-color');
             Route::put('update-color/{id}',[ColorController::class,'update'])->name('update-color');
             
             //Delete color
             Route::delete('delete-color/{id}',[ColorController::class,'delete']);     
    

            
        //---------------------------------------------Product-----------------------------------------

            Route::get('products',[ProductsController::class,'index'])->name('products');

            //Add Product
            Route::get('add-product',[ProductsController::class,'create'])->name('add-product');
            Route::post('store-product',[ProductsController::class,'store'])->name('store-product');
            
            //Update Product
            Route::get('edit-product/{id}',[ProductsController::class,'edit'])->name('edit-product');
            Route::put('update-product/{id}',[ProductsController::class,'update'])->name('update-product');

             //Delete product
             Route::delete('delete-product/{id}',[ProductsController::class,'delete']);
            
              //search Products
              Route::get('search',[ProductsController::class,'search'])->name('search');
             
             //------------------------------HomeSlider--------------------------------------------------
             Route::get('homeslider',[Homeslider::class,'index'])->name('homeslider');
            
             //Add slider
             Route::get('add-slider',[Homeslider::class,'create'])->name('add-slider');
             Route::post('store-slider',[Homeslider::class,'store'])->name('store-slider');

             //update Slider
             Route::get('edit-slider/{id}',[Homeslider::class,'edit'])->name('edit-slider');
             Route::put('update-slider/{id}',[Homeslider::class,'update'])->name('update-slider');
             
             //Delete Slider
             Route::delete('delete-slider/{id}',[Homeslider::class,'delete']);

        });
         //------------------------------Banners--------------------------------------------------
         Route::get('homebanner',[BannerController::class,'index'])->name('homebanner');
            
         //Add Banner
         Route::get('add-banner',[BannerController::class,'create'])->name('add-banner');
         Route::post('store-banner',[BannerController::class,'store'])->name('store-banner');

         //update Banner
         Route::get('edit-banner/{id}',[BannerController::class,'edit'])->name('edit-banner');
         Route::put('update-banner/{id}',[BannerController::class,'update'])->name('update-banner');
         
         //Delete Banner
         Route::delete('delete-banner/{id}',[BannerController::class,'delete']);

          //-----------------------------Coupons--------------------------------------------------
          Route::get('homecoupon',[CouponController::class,'index'])->name('homecoupon');
            
          //Add coupon
          Route::get('add-coupon',[CouponController::class,'create'])->name('add-coupon');
          Route::post('store-coupon',[CouponController::class,'store'])->name('store-coupon');
 
          //update coupon
          Route::get('edit-coupon/{id}',[CouponController::class,'edit'])->name('edit-coupon');
          Route::put('update-coupon/{id}',[CouponController::class,'update'])->name('update-coupon');
          
          //Delete coupon
          Route::delete('delete-coupon/{id}',[CouponController::class,'delete']);
        
        //-------------------------------Show Users-----------------------------
          Route::get('users',[UserController::class,'users'])->name('users');
          

          Route::middleware('auth:admin')->group(function(){
            Route::get('logout', [AuthController::class, 'logout'])->name('auth.logout');
        });
          
    });
});
