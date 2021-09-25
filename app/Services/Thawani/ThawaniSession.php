<?php

namespace App\Services\Thawani;
use Illuminate\Support\Facades\Http;
class ThawaniSession
{
    function createSession($paymentData=[]){
//        dd($paymentData);
        $response = Http::withHeaders([
            'Content-Type'=>'application/json',
            'thawani-api-key'=>'Pz8qRhENkL9i3jtPYnpdGq1hXxSfUm'

        ])->withOptions(['verify' => false])
        ->post('https://uatcheckout.thawani.om/api/v1/checkout/session/', $paymentData);
        return $response;
    }
}
