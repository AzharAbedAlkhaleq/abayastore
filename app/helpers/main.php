<?php

function saveImage($image, $folder){
    //save photo in folder
    $file_extension = $image-> getClientOriginalExtension();
    $file_name = md5(uniqid().time()).'.'.$file_extension;
    $path = $folder;
    $image-> move($path,$file_name);
    return $file_name;
}

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
