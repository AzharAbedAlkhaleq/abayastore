<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;
    protected $guarded=[];
     protected $date=['start_date','expiry_date'];

     public function order(){
         return $this->hasMany(Order::class);
     }
}
