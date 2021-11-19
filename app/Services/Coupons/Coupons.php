<?php
namespace App\Services\Coupons;

use App\Models\Coupon;
use Illuminate\Support\Facades\Session;
use App\Services\ShippingExpenses\ShippingExpenses;

 class Coupons{
     
  

    public function discount($request, $carts)
  {
    $shipping_details = new ShippingExpenses;
    $total_product = $shipping_details->TotalPriceProduct($carts);
   // $carts->product->price; 
    $coupon = Coupon::where('code', $request->code)->first();
    $value = $coupon->value;
    $new_total = 0;
    $products = [];
    //----------fixed discount---------
    if ($coupon->type == 'fixed' && $total_product > $coupon->greater_than) {
    
   
      $total_quantity = $carts->sum(function ($item) {
      return  $item->quantity ;
      }); 
        // return  $total_quantity;
        $value = $value/$total_quantity;
       // return  $value;
        $products = [];
        foreach ($carts as $cart) {
          $products[] = [
            "name" => $cart->product->name_ar,
            "quantity" => $cart->quantity,
            "unit_amount" =>intval(( $cart->product->price - $value) * 1000),
          ];
        }
     // $new_total = $request->total - $value;
        return $products;
    } 

    //-----------rate discount---------
    elseif ($coupon->type == 'rate' &&  $total_product > $coupon->greater_than) {
      // $new_value =   100 - $value;
     // $new_value =   $request->total * $value / 100;
    //  $new_total = $request->total - $new_value;
        
    
        foreach ($carts as $cart) {
            $new_value =   ($cart->product->price) * $value / 100;
          $products[] = [
            "name" => $cart->product->name_ar,
            "quantity" => $cart->quantity,
            "unit_amount" => intval(($cart->product->price - $new_value)*1000),
          ];
        }
        return $products;
       
    } 
    
    else {
      return (['error'=> "مشترياتك أقل من $coupon->greater_than"]);
    } 

   // Session::put('new total', $new_total);
    return $products;
  }

  public function discount_total($request,$total)
  {
    $coupon = Coupon::where('code', $request->code)->first();
    $value = $coupon->value;
    $new_total = 0;

    if ($coupon->type == 'fixed' && $total > $coupon->greater_than) {
      $new_total = $total - $value;
      return $new_total;
    }
     elseif ($coupon->type == 'rate' && $total > $coupon->greater_than) {
      // $new_value =   100 - $value;
      $new_value =   $total * $value / 100;
      $new_total = $total - $new_value;
    } 
    else {
      return (['error' => "لا يمكن تطبيق الكوبون ، مشترياتك أقل من $coupon->greater_than"]);
    }


    return [
            'total_discount'=>$new_total ,
             'id'=>$coupon->id,
            ];
  }

  
 }