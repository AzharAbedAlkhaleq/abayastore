<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    use HasFactory;
    protected $table= 'colors';
    protected $fillable=[
      
      'color',
      'status',
    ];

    public function product(){
      return $this->hasMany(Product::class,'color_id','id')->default(null);
    }
}