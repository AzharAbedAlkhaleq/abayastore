<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table= 'products';
    protected $fillable=[
      'category_id',
      'size_id',
      'color_id',
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
      'image_ar',
      'gallery',
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
        return $this->belongsTo(Color::class,'color_id','id')->withDefault([
          'color'=>'No Color'
        ]);
      }
      public function size(){
        return $this->belongsTo(Size::class,'size_id','id')->withDefault([
          'size'=>'No Size'
        ]);
      }
    public function banner(){
      return $this->hasMany(Banner::class,'category_id','id')->default('null');
    }

}
