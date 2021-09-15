<?php

if(!function_exists('lang')){
    function lang(){
        if(session()->has('lang')){
            return session()->get('lang');
        }else{
            session()->put('lang','ar');
            return "ar";
        }
    }
}

if(!function_exists('aurl')){
    function aurl($url){
        return url('/admin/'.$url);
    }
}

if(!function_exists('adminLogin')){
    function adminLogin(){
        return auth()->guard('admin')->user();
    }
}