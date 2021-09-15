<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Admin\CouponController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\EmailController;
use App\Http\Controllers\Admin\HomeCategoriesController;
use App\Http\Controllers\Admin\Homeslider;
use App\Http\Controllers\Admin\ProductsController;
use App\Http\Controllers\User\HomeController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'Lang'], function () {

    Route::group(['prefix' => 'admin'], function () {

        Route::get('login', [AuthController::class, 'login']);
        Route::post('login', [AuthController::class, 'auth']);

        Route::group(['middleware' => 'admin:admin'], function () {

            Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
        // Route::get('/email',[EmailController::class,'index']);
        
        //---------------------------------------------Category-----------------------------------------
        
            Route::get('categories',[CategoriesController::class,'index'])->name('categories');
            
            //Add Category
            Route::get('add-category',[CategoriesController::class,'create'])->name('add-category');
            Route::post('store-category',[CategoriesController::class,'store'])->name('store-category');
           
            //Update Category
            Route::get('edit-category/{id}',[CategoriesController::class,'edit'])->name('edit-category');
            Route::put('update-category/{id}',[CategoriesController::class,'update'])->name('update-category');
            
            //Delete Category
            Route::delete('delete-category/{id}',[CategoriesController::class,'delete'])->name('delete-category');

        //---------------------------------------------Product-----------------------------------------

            Route::get('products',[ProductsController::class,'index'])->name('products');

            //Add Product
            Route::get('add-product',[ProductsController::class,'create'])->name('add-product');
            Route::post('store-product',[ProductsController::class,'store'])->name('store-product');
            
            //Update Product
            Route::get('edit-product/{id}',[ProductsController::class,'edit'])->name('edit-product');
            Route::put('update-product/{id}',[ProductsController::class,'update'])->name('update-product');

             //Delete product
             Route::delete('delete-product/{id}',[ProductsController::class,'delete'])->name('delete-product');
            
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
          Route::get('home-coupon',[CouponController::class,'index'])->name('home-coupon');
            
          //Add coupon
          Route::get('add-coupon',[CouponController::class,'create'])->name('add-coupon');
          Route::post('store-coupon',[CouponController::class,'store'])->name('store-coupon');
 
          //update coupon
          Route::get('edit-coupon/{id}',[CouponController::class,'edit'])->name('edit-coupon');
          Route::put('update-coupon/{id}',[CouponController::class,'update'])->name('update-coupon');
          
          //Delete coupon
          Route::delete('delete-coupon/{id}',[CouponController::class,'delete']);
          
          //-----------------------------HomeCategories-----------------------
          Route::get('HomeCategories',[HomeCategoriesController::class,'index'])->name('HomeCategories');

    });
});
