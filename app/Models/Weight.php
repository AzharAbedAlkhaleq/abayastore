<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Weight extends Model
{
    protected $fillable = ['weight','zone_1','zone_2','zone_3','zone_4','zone_5','zone_6','zone_7'];
    use HasFactory;
}
