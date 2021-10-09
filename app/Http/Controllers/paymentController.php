<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use App\Services\Thawani\ThawaniSession;

class paymentController extends Controller
{
public function pay(){
    $payment = new ThawaniSession();
    $referance_id = 'ord-'.time();
    $carts = Cart::with('product')->where('cart_id', App::make('cart.id'))->get();
    $products = [];
    foreach($carts as $cart){
     $products[] = [ 
        "name"=> $cart->product->name_ar,
        "quantity"=> $cart->quantity,
        "unit_amount"=>  ($cart->product->orginal_price - ($cart->product->orginal_price * $cart->product->Selling_price) / 100) *1000,
     ];
    }
   // dd( $products);
    $paymentData = [
      "client_reference_id"=> $referance_id ,
      "mode"=> "payment",
     
      "products"=> $products,
    
    "success_url"=> route('payment.success',$referance_id),
    "cancel_url"=> route('payment.cancel',$referance_id),
    "metadata"=> [
        'customer_name' => 'sdasd',
        'customer_id' => 10,
        'order_id' => 10,
        'customer_email' =>'aa@we.com',
        'customer_phone' => 234234
    ]
];

  $respone =   $payment->createSession($paymentData);
  if(data_get($respone, 'result') == 'success') {
    $session_id = data_get($respone, 'session_id');
    session()->put('order_session_id_'.$referance_id,  $session_id);
    return redirect()->away(data_get($respone, 'redirect'));
  } 
  dd("error");

}

public function success(Request $request,$referance_id){
    //dd($request->all());
    $session_id= session()->get('order_session_id_'.$referance_id);
    $payment = new ThawaniSession();
    $payment->getSession($session_id);
    // to do
    //create order
    Order::create([
        
    ]);

}
public function cancel(Request $request,$referance_id){
    dd($request->all());
}
}
