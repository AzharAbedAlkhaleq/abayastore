<?php

namespace App\Http\Controllers\User;

use Twilio\Rest\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function generateRandomDigits($int){
        $digits = $digits ?? 4;
        return rand(pow(10, $digits-1), pow(10, $digits)-1);
    }
    public function login()
    {
        return view('user.auth.login');
    }
    public function auth(Request $request){
        $user = $request->phone;
        $verification_code = $this->generateRandomDigits(4);
        $message = 'Your '. env('APP_NAME') .' verification code is : '. $verification_code;
            $client = new Client(env('TWILIO_ACCOUNT_SID'), env('TWILIO_AUTH_TOKEN'));
            
            try {
                $response = $client->messages->create($request->phone,
                    [
                        'from' => '+17722093454',
                        'body' => $message,
                        'messagingServiceSid' => env('TWILIO_MESSAGING_SERVICE_SID')
                    ]
                );
            } catch (\Exception $e) {
                dd($e->getMessage());
                // return $this->sendResponse(false,,null,400);
            }
    
    dd('send success');
    }


    public function logout(Request $request) {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        return redirect('/');
    }


    
    
}
