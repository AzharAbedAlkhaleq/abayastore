<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
 public function index(){
     $coupons= Coupon::paginate(6);
    return view('admin.coupon.index',compact('coupons'));
 }
   public function create(){

       return view('admin.coupon.create');

   }
   public function store(Request $request){
     $coupons=new Coupon();
     $coupons->coupon_option=$request->input('coupon_option	 ');
     $coupons->coupon_code =$request->input('coupon_code ');
     $coupons->coupon_code =$request->input('coupon_code ');
     $coupons->coupon_type =$request->input('coupon_type ');
     $coupons->amount_type =$request->input('amount_type ');
     $coupons->	amount=$request->input('amount');
     $coupons->expiry_date =$request->input('expiry_date ');
     $coupons->status=$request->input('status') == true? '1':'0';
     $coupons->save();
     return redirect()->route('homecoupon')->with('status','تمت الإضافة!');



   }
 


}


