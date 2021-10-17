<?php

namespace App\Services\Thawani;
use Illuminate\Support\Facades\Http;
class ThawaniSession
{
    function createSession($paymentData=[]){
       
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
              //https://[uat]checkout.thawani.om/pay/{session_id}?key=publishable_key
              $redirect_url = 'https://uatcheckout.thawani.om/' ."pay/". $session_id.'?key='. $publishable_key;
              return array(
                'result'   => 'success',
                'redirect' => $redirect_url,
                'session_id' => $session_id
              );
            } else {
              
              return ['result' => 'error'];
            }
          }
    }

    
    function getSession($session_id){
       
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
          CURLOPT_URL => $thawani_api.'checkout/session/'.$session_id,
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "GET",
          CURLOPT_HTTPHEADER => [
            "Content-Type: application/json",
            "Thawani-Api-Key:" . $secret_key
          ],
        ]);
        $result = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        if ($err) {
         // dd($err);
          return ['result' => 'error', 'message' => $err];

        } else {
          $response = json_decode($result, true);
          $code = $response['code'];
          //dd($code);
          if($code == 2000 || $code == '2000') {
           dd($response);
          } else {
            
            return ['result' => 'error'];
          }
        }
  }
}
