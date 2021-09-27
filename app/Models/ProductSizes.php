<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductSizes extends Model
{
    use HasFactory;
    protected $table = 'product_sizes';
    protected $fillable = ['id','product_id','size_id','created_at','updated_at'];
    public function product(){
        return $this->belongsTo(Product::class , 'product_id','id');
    }
    public function size (){
        return $this->belongsTo(Size::class , 'size_id');
    }
}
