<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    use HasFactory;
    protected $table= 'sizes';
    protected $fillable=[
      
      'size',
      'status',
    ];

    public function product(){
      return $this->belongsToMany(Product::class,'size','id')->default(null);
    }
}
