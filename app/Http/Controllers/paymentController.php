<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Thawani\ThawaniSession;

class paymentController extends Controller
{
public function pay(){
    $payment = new ThawaniSession();

  $respone =   $payment->createSession([
            "client_reference_id"=> '123412',
            "mode"=> "payment",
            "products"=> [
                [
                  "name"=> "string",
                  "quantity"=> 1,
                  "unit_amount"=> 100
                ]
          ],
          "customer_id"=>"120",
          "success_url"=> 'www.google.com',
          "cancel_url"=> 'www.google.com',
          "save_card_on_success"=> false,
            "plan_id"=> 'plan_x656s8x979s',
//          "metadata"=> [
//          ]
    ]);
  dd($respone);

}

public function success(Request $request){
    dd($request->all());
}
public function cancel(Request $request){
    dd($request->all());
}
}
