<?php

namespace App\Http\Controllers\User;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SearchController extends Controller
{
    public function search(Request $request)
    {
       $search=$request->search;
       if($search == null){
          $products=Product::orderby('created_at','DESC')->take(8)->get();
         return view('user.search',compact('products'));

       }
       else
        $products=Product::where('name_ar','like','%'.$search.'%')->orWhere('name_en','like','%'.$search.'%')->take(8)->get();
      $categories=Category::where('name_ar','like','%'.$search.'%')->orWhere('name_en','like','%'.$search.'%')->take(8)->get();
       return view('user.search',compact('products','categories'));
    }
}
