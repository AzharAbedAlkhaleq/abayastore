<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Facade\FlareClient\Http\Client;
use Illuminate\Http\Request;

class VerificationController extends Controller
{
    public function generateRandomDigits($int){
        $digits = $digits ?? 4;
        return rand(pow(10, $digits-1), pow(10, $digits)-1);
    }
    public function sendSMSCode(Request $request){

     
}
}