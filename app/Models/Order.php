<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;
    protected $guarded = [];
    
   

    public function orderProduct(){
        return $this->hasMany(OrderProduct::class);
    }

    public function customer(){
        return $this->belongsTo(Customer::class);
    }

    public function coupon(){
        return $this->belongsTo(Coupon::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
    
    public function getCreatedAtAttribute($date)
    {
       return Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('Y-m-d');
    }
  
}

