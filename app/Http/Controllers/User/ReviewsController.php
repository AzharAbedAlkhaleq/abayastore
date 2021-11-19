<?php

namespace App\Http\Controllers\User;

use App\Models\Review;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ReviewsController extends Controller
{
    public function store(Request $request){
       
       $review = new Review;
       $review->user_id= Auth::user()->id; 
       $review->product_id = $request->product_id;
       $review->rate = $request->rate;
       $review->notes = $request->notes;
       $review->save();
       return redirect()->back();
            
    }
}
