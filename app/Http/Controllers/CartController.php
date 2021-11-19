<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Rules\QuantityValidate;
use App\Services\Asyad\Asyad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class CartController extends Controller
{
    public function index()
    {
       /*  $asyad = new Asyad;
        return $asyad->pushOrder(); */
       
        
        $cart = Cart::with('product')->where('cart_id', App::make('cart.id'))->get();
        // return $cart;
        $total_orginal_price = $cart->sum(function ($item) {
            return ($item->product->orginal_price);
        });
      

        $total_discount = $cart->sum(function ($item) {
          
            return ($item->product->Selling_price);
        });

        $total = $cart->sum(function ($item) {
           
            $total_orginal_price = $item->quantity * $item->product->orginal_price;
            return ((($total_orginal_price ) - ($total_orginal_price* ($item->product->Selling_price) / 100))) ;
        });
        
        return view('user.cart', [
            'cart' => $cart,
            'total_orginal_price' => $total_orginal_price,
            'total_discount' => $total_discount,
            'total'=>$total
        ]);
    }

    public function addcart(Request $request)
    {
        if (Auth::check()) {
           
        
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => ['int','min:1', new QuantityValidate($request->post('product_id'))],
        ]);

        $cart_id = App::make('cart.id');
        $product = Product::findOrFail($request->post('product_id'));
        $product_id = $request->post('product_id');
        $quantity = $request->post('quantity', 1);

        $cart = Cart::where([
            'cart_id' => $cart_id,
            'product_id' =>  $product_id,
            'size_id' => $request->post('product-size'),
            'color_id' => $request->post('product-color')
        ])->first();

        if ($cart) {
            $cart->increment('quantity', $quantity);
            return response()->json([
                'status' => 'update',
                'msg' => 'تم تعديل كميةالمنتج بنجاح',


            ]);
        } else {
            $cart = Cart::create([
                'user_id' => Auth::id(),
                'cart_id' => $cart_id,
                'product_id' => $request->post('product_id'),
                'quantity' => $request->post('quantity', 1),
                'size_id' => $request->post('product-size'),
                'color_id' => $request->post('product-color')
            ]);
            
            if ($cart)
                return response()->json([
                    'status' => true,
                    'msg' => 'تم اضافة المنتج بنجاح بنجاح',
                    'count' => $cart->countو


                ]);
            else
                return response()->json([
                    'status' => false,
                    'msg' => 'فشل الحفظ برجاء المحاولة مجددا',
                    

                ]);
        }
    }
    else{
        
        return response()->json([
            'status' => 'login',]);
    }
    }

    public function update(Request $request){
    
        $request->validate([
            'product_id' => 'exists:products,id',
            'quantity' => ['int','min:1', new QuantityValidate($request->post('product_id'))],
        ]);
        $quantity = $request->quantity;
        $product_id = $request->product_id;
        $cart_id = App::make('cart.id');
        
        $cart = Cart::where([
            'cart_id' => $cart_id,
            'product_id' =>  $product_id,
           
        ])->first();
          
        if ($cart) {
            $cart->quantity = $quantity;
            $cart->update();
            return response()->json([
                'status' => true,
                'msg' => 'تم التعديل بنجاح',

            ]);
          }else
          return response()->json([
              'status' => false,
              'msg' => 'فشل الحفظ برجاء المحاولة مجددا',
              

          ]);

    }
    public function delete($id)
    {
        $cart = Cart::findOrFail($id);
        $cart->delete();
        return redirect()->back()->with('success', " تم الغاء الطلب بنجاح");
    }
}
