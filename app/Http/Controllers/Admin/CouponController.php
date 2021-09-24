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
   //  dd($request->all());
     $coupons=new Coupon();
     $coupons->code=$request->input('code');
     $coupons->value =$request->input('value ');
    //  $coupons->use_time =$request->input('use_time ');
     $coupons->start_date=$request->input('start_date ');
     $coupons->expire_date =$request->input('expire_date');
     $coupons->type=$request->input('type') == true? 'fixed':'percentage';

     $coupons->status=$request->input('status') == true? '1':'0';
     $coupons->save();
     return redirect()->route('homecoupon')->with('status','تمت الإضافة!');

   }
   public function edit($id){
    $coupon = Coupon::find($id);
    return view('admin.coupon.edit',compact('coupon'));
   }
   //----------------------------------------------update--------------------------------------------
   public  function update(Request $request,$id)
   {
       
    $coupon= Coupon::find($id);

    $coupons=new Coupon();
    $coupons->code=$request->input('code');
    $coupons->value =$request->input('value');
    // $coupons->use_time =$request->input('use_time');
    $coupons->start_date=$request->input('start_date');
    $coupons->expire_date =$request->input('expire_date');
    $coupons->type=$request->input('type') == true? 'fixed':'percentage';

    $coupons->status=$request->input('status') == true? '1':'0';
    $coupon->update();
    return redirect( route('homecoupon'))->with('status','تم التعديل بنجاح!');
   }

   //----------------------------------------------delete Coupon-------------------------------------
   public function delete($id){
     //dd($id);

    $coupons= Coupon::find($id);
    $coupons->delete();
    return redirect()->back()->with('status','تم الحذف!');          
}

}


