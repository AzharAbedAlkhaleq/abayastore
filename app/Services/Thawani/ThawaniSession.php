<?php

namespace App\Services\Thawani;
use Illuminate\Support\Facades\Http;
class ThawaniSession
{
    function createSession($paymentData=[]){
        $paymentData = [
            "client_reference_id"=> '123412',
            "mode"=> "payment",
            "products"=> [
                [
                  "name"=> "string",
                  "quantity"=> 1,
                  "unit_amount"=> 100
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
        // $response = Http::withHeaders([
        //     'Content-Type'=>'application/json',
        //     'thawani-api-key'=>'Pz8qRhENkL9i3jtPYnpdGq1hXxSfUm'

        // ])
        // ->withBody(json_encode($paymentData), 'data')
        // ->withOptions(['verify' => false])
        // ->post('https://uatcheckout.thawani.om/api/v1/checkout/session/', $paymentData);
        // return $response;

        $secret_key = 'Pz8qRhENkL9i3jtPYnpdGq1hXxSfUm'; 
        $publishable_key='y1qflixWpomUmJkjVlvf5lCuiBwHCf';  
        $thawani_api=  'https://uatcheckout.thawani.om/api/v1/';
        $curl = curl_init();
          curl_setopt_array($curl, [
            CURLOPT_URL => $thawani_api.'checkout/session/',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => json_encode($paymentData),
            CURLOPT_HTTPHEADER => [
              "Content-Type: application/json",
              "Thawani-Api-Key:" . $secret_key
            ],
          ]);
          $result = curl_exec($curl);
          $err = curl_error($curl);
          curl_close($curl);
          if ($err) {
            return ['result' => 'error', 'message' => $err];
          } else {
            $response = json_decode($result, true);
            $code = $response['code'];
            if($code == 2004 || $code == '2004') {
              $session_id = $response['data']['session_id'];
              $invoice_id = $response['data']['invoice'];
            
              $redirect_url = $thawani_api ."pay/". $session_id.'?key='. $publishable_key;
              return array(
                'result'   => 'success',
                'redirect' => $redirect_url
              );
            } else {
              
              return ['result' => 'error'];
            }
          }
    }
}
