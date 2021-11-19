<?php

namespace App\Services\ShippingExpenses;

use App\Models\Cart;
use App\Models\Zone;
use App\Models\Weight;
use App\Services\Coupons\Coupons;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\App;

class ShippingExpenses
{
    public function  TotalPriceProduct($cart){
        $carts = $cart;

        $total_price_product = $carts->sum(function ($item) {

            $total_orginal_price = $item->quantity * $item->product->orginal_price;
            return ((($total_orginal_price) - ($total_orginal_price * ($item->product->Selling_price) / 100)));
        });
        return $total_price_product;
    }


    public function TotalWeight($cart)
    {
        $carts = $cart;

        $total_weight = $carts->sum(function ($item) {

            return $item->quantity * $item->product->weight;
        });

        return $total_weight;
    }


    public function ShippingExpenses($request,$cart)
    {

        $total_product = $this->TotalPriceProduct($cart);

      
        $total_weight_kg = $this->TotalWeight($cart)/ 1000;

        $shipping_expenses = null;
        $country = null;
        $weight_x = null;

        if ($request->country == 'Oman') {
            if ($total_weight_kg < 5) {
                $shipping_expenses = 2;
            } else {
                $shipping_fees = 2;
                $extra_weight = ($total_weight_kg - 5) * 0.5;
                $shipping_expenses = 2 + $extra_weight;
            }
        } elseif ($request->country) {


            $country = Zone::where('name', $request->country)->first();
            $zone = $country->zone;
            
            if ($total_weight_kg < 10) {

                $weight_x = ceil($total_weight_kg / 0.5) * 0.5;
                $weight = Weight::where('weight', $weight_x)->first();
                $shipping_expenses = $weight->$zone;
            } elseif ($total_weight_kg > 10) {

                $weight_x = ceil($total_weight_kg / 1) * 1;
                $weight = Weight::where('weight', $weight_x)->first();
                $shipping_expenses = $weight->$zone;
            }
        }
     
      
        $total = $shipping_expenses + $total_product;
      
        return [
            "total_product" => $total_product,
            "request" => $request->all(),
            "country" => $country,
            'weight' => $total_weight_kg,
            'shipping_expenses' => $shipping_expenses,
            'total_weight' =>  $weight_x,
            'total'=>$total
        ];
    }
}
