<?php

namespace Database\Seeders;

use App\Models\Coupon;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class couponseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      Coupon::create([
         'code' =>'Azhar87',
         'type'=>'fixed',
         'value'=>'200',
         'description'=>'Discount 200 OMR on your sales on website',
         'use_time' =>'20',
         'start_date' =>Carbon::now(),
         'expire_date' =>Carbon::now()->addMonth(),
         'greater_than'=>'600',
     
        ]);
        Coupon::create([
            'code' =>'FiftyFifty',
            'type'=>'percentage',
            'value'=>'50',
            'description'=>'Discount 50%  on your sales on website',
            'use_time' =>'5',
            'start_date' =>Carbon::now(),
            'expire_date' =>Carbon::now()->addWeek(),
            'greater_than'=>'null',
        
           ]);
           $this->call(Coupon::class);

    }
}
