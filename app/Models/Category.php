<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function product(){
        return $this->hasMany(Product::class,'category_id','id');
      }
      public function banner(){
        return $this->hasMany(Banner::class,'category_id','id');
      }
      public static function validateRules()
      {
          return [
              'name_ar'=>'required|string|max:50|min:3|unique:categories',
              'name_en'=>'required|string|max:50|min:3|unique:categories',
              'image_ar'=>'required|image',
              'status'=>'required',
              //'popular'=>'required|in:0,1',
          ];
      }
  
}
