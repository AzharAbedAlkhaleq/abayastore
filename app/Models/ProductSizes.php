<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductSizes extends Model
{
    use HasFactory;
    protected $table = 'product_sizes';
    protected $fillable = ['id','product_id','size_id','created_at','updated_at'];
    public function product(){
        return $this->belongsTo(Product::class , 'product_id','id');
    }
}
