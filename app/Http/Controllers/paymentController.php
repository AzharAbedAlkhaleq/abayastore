<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class paymentController extends Controller
{
public function pay(){
    return view('user.payment.pay');
}
}
