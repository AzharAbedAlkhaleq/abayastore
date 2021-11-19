<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Costumer;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Services\Coupons\Coupons;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Session;
use App\Services\Thawani\ThawaniSession;
use App\Services\ShippingExpenses\ShippingExpenses;

class paymentController extends Controller
{
  public function pay(Request $request)
  {

   // dd($request->all());
   if ($request->payment_method == 'cancel'){
    
    return redirect('/')->with('success','تم  الغاء طلبك بنجاح');
  }

    $referance_id = 'ord-' . time();
    $carts = Cart::with('product')->where('cart_id', App::make('cart.id'))->update([
      'referance_id' => $referance_id
    ]);
    $carts = Cart::with('product')->where('referance_id', $referance_id)->get();
    $coupon = new Coupons;
    $shipping_details = new ShippingExpenses;
    $total_product = $shipping_details->TotalPriceProduct($carts);
    $total_weight_kg = $shipping_details->TotalWeight($carts)/1000;
    $details = $shipping_details->ShippingExpenses($request,$carts);
    
    if ($request->code ) {
      $total_discount = $coupon->discount_total($request,$total_product);
    //  dd($total_discount);
      if (isset($total_discount['total_discount'])) {
        $cod_amount =  $total_discount['total_discount'] + $details['shipping_expenses'];
      }
      else{
        return redirect()->back()->with('error',$total_discount['error']) ;
      }
    }
    else{
      $cod_amount = $details['total'];
    }

    //---------------------------------------------------
  //  ***************  Create Customer *********
 //--------------------------------------------------
    $request->merge([
      'user_id' => Auth::user()->id,
    ]);
     
    if (Auth::user()->customer) {
      $customer = Auth::user()->customer;
      $customer->update($request->all());
    }else{

      $customer = Customer::create($request->all());
    }

//---------------------------------------------------
//  ***************  Create Order *********
//---------------------------------------------------
    $order = new Order;
    $order->user_id = Auth::user()->id;
    $order->customer_id = $customer->id;
    $order->payment_method = $request->payment_method;
    $order->payment_status = 'unpaid';
    $order->transaction_id =  $referance_id;
    $order->subtotal = $total_product;
    $order->total_discount = $total_discount['total_discount'] ?? "0";
    $order->delivery = $details['shipping_expenses'];
    $order->grandtotal = $cod_amount;
    $order->cod_amount = $cod_amount;
    $order->weight = $details['weight'];
    $order->coupon_id = $total_discount['id']  ?? null;
    $order->save();
    
    foreach ($carts as $item) {
      $order->orderProduct()->create([
        'product_id' => $item->product_id,
        'quantity' => $item->quantity,
        'price' => $item->product->price,
        'total' => $item->quantity * $item->product->price,
      ]);
    }


    if ($request->payment_method == 'COD'&& $request->country == 'Oman'){

      $carts = Cart::where('referance_id',$referance_id)->get();

      foreach($carts as $cart){
        $cart->product->decrement('quantity',$cart->quantity);
        $cart->delete();
      }

      return redirect('/')->with('success','تم  ارسال طلبك بنجاح');


    }
//---------------------------------------------------
//  ***************  Payment Getway *********
//---------------------------------------------------
    elseif ($request->payment_method == 'PREPAID' ) {


      $payment = new ThawaniSession();
      $products = [];

      if ($request->code) {

        $products = $coupon->discount($request,$carts);
       
       }
      else{
      foreach ($carts as $cart) {
        $products[] = [
          "name" => $cart->product->name_ar,
          "quantity" => $cart->quantity,
          "unit_amount" => $cart->product->price * 1000,
        ];
      }
    }
    $products[] = [
      "name" => 'تكاليف الشحن',
      "quantity" => 1,
      "unit_amount" =>  $details['shipping_expenses']* 1000,
    ];
      $paymentData = [
        "client_reference_id" => $referance_id,
        "mode" => "payment",

        "products" => $products,

        "success_url" => route('payment.success', $referance_id),
        "cancel_url" => route('payment.cancel', $referance_id),
        "metadata" => [
          'customer_name' => $order->customer->fname ." ". $order->customer->lanme,
          'customer_id' => $order->customer->id,
          'order_id' => $order->id,
          'customer_email' => $order->customer->email,
          'customer_phone' => $order->customer->phone,
        ]
      ];

      $respone =   $payment->createSession($paymentData);
      if (data_get($respone, 'result') == 'success') {
        $session_id = data_get($respone, 'session_id');
        session()->put('order_session_id_' . $referance_id,  $session_id);
        return redirect()->away(data_get($respone, 'redirect'));
      }
      dd($respone);
    }
   
  }


  public function success(Request $request, $referance_id)
  {
    //dd($request->all());
    $session_id = session()->get('order_session_id_' . $referance_id);
    $payment = new ThawaniSession();
    $payment->getSession($session_id);
    // to do
    //update order
    $order = Order::where('transaction_id',$referance_id)->first();
    $order->payment_status = 'paid';
    $order->cod_amount = 0;
    $order->status = "preparing";
    $order->update();
    $carts = Cart::where('referance_id',$referance_id)->get();

    foreach($carts as $cart){
      $cart->product->decrement('quantity',$cart->quantity);
      $cart->delete();
    }
  
    return redirect('/')->with('success','تم الدفع بنجاح');
  }


  public function cancel(Request $request, $referance_id)
  {
    //dd($request->all());

    $order = Order::where('transaction_id',$referance_id)->first();
    $order->status = "canceled";
    $order->update();

  
    return redirect('/')->with('success','تم الغاء الطلب بنجاح');
  }
}
