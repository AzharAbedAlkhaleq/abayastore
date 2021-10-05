<?php

namespace App\Providers;

use Illuminate\Support\Str;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()

    {
        $this->app->bind('cart.id',function(){

            $id = Cookie::get('cart_id');
            
            if (!$id) {
                $id = Str::uuid();
                Cookie::queue('cart_id', $id, 60 * 24 * 30);
            }
    
            return $id;
            
           });
       
        Paginator::useBootstrap();
    }

   
}
