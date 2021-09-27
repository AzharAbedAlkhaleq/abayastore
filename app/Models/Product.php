<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table= 'products';
    protected $fillable=[
      'id', 
      'category_id',
      // 'size_id',
      // 'color_id',
      'code',
      'name_ar',
      'slug_ar',
      'name_en',
      'slug_en',
      'small_desc_ar',
      'small_desc_en',
      'description_ar',
      'description_en',
      'orginal_price',
      'Selling_price',
      'quantity',
      'image',
      'status',
      'trending',
      'video',

    ];
    public function category(){
      return $this->belongsTo(Category::class,'category_id','id')->withDefault([
        'name_ar'=>'No Category'
      ]);
    }
    public function color(){
       return $this->hasMany(ProductColors::class , 'product_id');
      }
      public function size(){
          return $this->hasMany(ProductSizes::class , 'product_id');
      }
      public function images(){
        return $this->hasMany(ProductImage::class,'product_id');
      }

    public function banner(){
      return $this->hasMany(Banner::class,'category_id','id')->default('null');
    }

}
