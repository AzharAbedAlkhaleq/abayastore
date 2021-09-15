<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected $hidden = [
        'name_ar',
        'name_en',
        'currency_ar',
        'currency_en',
    ];

    protected $appends = [
        'name',
        'currency',
    ];

    public function getNameAttribute(){
        if(lang() == "ar"){
            return $this->name_ar;
        }else{
            return $this->name_en;
        }
    }

    public function getCurrencyAttribute(){
        if(lang() == "ar"){
            return $this->currency_ar;
        }else{
            return $this->currency_en;
        }
    }

    public function cities(){
        return $this->hasMany(City::class , 'country_id');
    }

}

