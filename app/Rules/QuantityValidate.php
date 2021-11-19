<?php

namespace App\Rules;

use App\Models\Product;
use Illuminate\Contracts\Validation\Rule;

class QuantityValidate implements Rule
{
   public $product_id;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($id)
    {
        $this->product_id = $id;
       // $product_id = Product::whare('id',$product_id)->fiirst();
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
      $product = Product::where('id',$this->product_id)->first();
      return $product->quantity >= $value ;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'الكمية غير موجودة';
    }
}
