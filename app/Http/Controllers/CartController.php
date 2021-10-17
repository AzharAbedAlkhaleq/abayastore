<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Rules\QuantityValidate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class CartController extends Controller
{
    public function index()
    {


        $cart = Cart::with('product')->where('cart_id', App::make('cart.id'))->get();
        // return $cart;
        $total = $cart->sum(function ($item) {
            // $item->product->Selling_price * $item->quantity;
            return ($item->product->orginal_price - ($item->product->orginal_price * $item->product->Selling_price) / 100) * $item->quantity;
        });
        return view('user.cart', [
            'cart' => $cart,
            'total' => $total
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
                'msg' => 'تم اضافة المنتج بنجاح',


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
            'status' => 'login',
            'route'=>'login'
        ]);
    }
    }

    public function delete($id)
    {
        $cart = Cart::findOrFail($id);
        $cart->delete();
        return redirect()->back()->with('success', " تم الغاء الطلب بنجاح");
    }
}
