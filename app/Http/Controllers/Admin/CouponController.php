<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
 public function index(){
     $coupons= Coupon::pignate(7);
    return view('admin.coupon.index',compact('coupons'));
 }
 }
