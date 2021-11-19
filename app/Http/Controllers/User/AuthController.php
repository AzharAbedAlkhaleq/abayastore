<?php

namespace App\Http\Controllers\User;

use App\Models\Cart;
use App\Models\Zone;
use App\Models\Weight;
use App\Models\Country;
use Twilio\Rest\Client;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use App\Models\Area;
use Illuminate\Support\Facades\Auth;
use App\Services\ShippingExpenses\ShippingExpenses;

class AuthController extends Controller
{
    public function generateRandomDigits($int)
    {
        $digits = $digits ?? 4;
        return rand(pow(10, $digits - 1), pow(10, $digits) - 1);
    }
    public function login()
    {

        $cart = Cart::with('product')->where('cart_id', App::make('cart.id'))->get();
        // return $cart;
        $total_orginal_price = $cart->sum(function ($item) {

            return ($item->product->orginal_price);
        });


        $total_discount = $cart->sum(function ($item) {

            return ($item->product->Selling_price);
        });

        $total = $cart->sum(function ($item) {

            return (($item->product->orginal_price - ($item->product->orginal_price * $item->product->Selling_price) / 100)) * $item->quantity;
        });
        $countries = Country::get();
        $areas = Area::get();
        $user = Auth::user();
        return view('user.auth.login', [
            'cart' => $cart,
            'total_orginal_price' => $total_orginal_price,
            'total_discount' => $total_discount,
            'total' => $total,
            'countries' => $countries,
            'user'=> $user,
            'areas'=>$areas,
        ]);
    }


    public function auth(Request $request)
    {
        $user = $request->phone;
        $verification_code = $this->generateRandomDigits(4);
        $message = 'Your ' . env('APP_NAME') . ' verification code is : ' . $verification_code;
        $client = new Client(env('TWILIO_ACCOUNT_SID'), env('TWILIO_AUTH_TOKEN'));

        try {
            $response = $client->messages->create(
                $request->phone,
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


    public function logout(Request $request)
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        return redirect('/');
    }

    public function registerValidateURL(Request $request)
    {
        if ($request->has('fname')) {
            $validate =   $request->validate([
                'email' => 'required|string',
                'fname' => 'required|string',
                'lname' => 'required|string',
                'phone' => 'required',
                'postal_code' => 'required',
                'street' => 'required',
                'country' => 'required',
                'city' => 'required',

            ], [
                'fname.required' => 'حقل الاسم اجباري',
                'email.required' => 'حقل الايميل  اجباري',
                'lname.required' => 'حقل اسم  العائلة اجباري',
                'phone.required' => 'حقل الهاتف  اجباري',
                'postal_code.required' => 'حقل الرمز البريدي  اجباري',
                'street.required' => 'حقل العنوان  اجباري',
                'country.required' => 'حقل  الدولة اجباري',
                'city.required' => 'حقل المدينة اجباري',
                'string' => 'هذا الحقل يجب ان يكون نص'
            ]);
        }
                $details_cart = null;

                if ($request->country) {    
                    $cart = Cart::with('product')->where('cart_id', App::make('cart.id'))->get();          
                    $orderD =  new ShippingExpenses;
                    $details_cart =  $orderD->ShippingExpenses($request,$cart);
                }

                
              return response()->json($details_cart);
    }
}
