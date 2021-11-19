<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReviewsController extends Controller
{
    public function index(){
        $reviews = Product::with('reviews')->whereHas('reviews')->paginate(10);
        return view('admin.reviews.index',[
            'reviews' => $reviews,
        ]);
    }
}
