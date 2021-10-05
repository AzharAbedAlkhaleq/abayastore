<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CouponsController extends Controller
{
    public function discount(Request $request){
        $coupon = Coupon::where('code',$request->code)->first();
        $value = $coupon->value;
        $new_total = 0;
      //return( $coupon);
      if($coupon->type == 'fixed'&& $request->total > $coupon->greater_than){
        $new_total = $request->total-$value;
        
      }
      elseif($coupon->type == 'rate'&& $request->total > $coupon->greater_than){
       // $new_value =   100 - $value;
        $new_value =   $request->total*$value/100;
        $new_total = $request->total-$new_value;
        
      }
    else{
      return redirect()->back()->with('error',"مشترياتك أقل من $coupon->greater_than");
    }
       
      Session::put('new total',$new_total);
       return redirect()->back();

    }

    public function delete(){
        Session::remove('new total');
        return redirect()->back();
    }
}
