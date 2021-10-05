<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Thawani\ThawaniSession;

class paymentController extends Controller
{
public function pay(){
    $payment = new ThawaniSession();
    $paymentData = [
      "client_reference_id"=> 'ord-'.time() ,
      "mode"=> "payment",
      "products"=> [
          [ // pantaloon    50 
            "name"=> "pantalom",
            "quantity"=> 5,
            "unit_amount"=> 50*1000,
          ],
          [ // pantaloon    50 
            "name"=> "pantalom",
            "quantity"=> 2,
            "unit_amount"=> 20*1000,
          ]
    ],
    "success_url"=> route('payment.success'),
    "cancel_url"=> route('payment.cancel'),
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
    return redirect()->away(data_get($respone, 'redirect'));
  } 
  dd("error");

}

public function success(Request $request){
    dd($request->all());
}
public function cancel(Request $request){
    dd($request->all());
}
}
