<?php

namespace App\Http\Controllers\User;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\App;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use function PHPUnit\Framework\isNull;
use Illuminate\Support\Facades\Cookie;

class WishlistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Cookie::get('id_product');

        if (!empty($id)) {
            $id = json_decode($id);
            $products = null;
            //  return $id;
            if (is_array($id) && count($id) > 0) {
                $products = Product::whereIn('id', $id)->get();
                
            } 
            return view('user.wishlist', [
                'products' => $products,
                'product_id' => $id
            ]);
        }
        else{
            return view('user.wishlist', [
                'products' => new Product(),
                'product_id' => []
            ]);
        }
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id = Cookie::get('id_product');
        $product = [];
        if ($id) {
            $ids = $id;
            $ids = json_decode($ids);
            
            if ( array_search($request->id, $ids)!== false) {
                return response()->json([
                    'status' => true,
                    'msg' => 'تم اضافة المنتج مسبقاً',
                    'count' => 0
                ]);
            }
        
            elseif (is_array($ids) && count($ids) > 0) {
                foreach ($ids as $id) {

                    $product[] = $id;
                }
            }
            $id = json_decode($id);
            $product[] = $request->id;
        } else {
            $product[] = $request->id;
        }

        $id_product =  Cookie::queue('id_product',  json_encode($product), 60 * 24 * 7);
        $response = new Response('product wishlist');
        $response->withCookie(cookie('id_product',  json_encode($product), 60 * 24 * 7));


        $id = Cookie::get('id_product');
        $id = json_decode($id);
        $count = count($id);

        if ($response)
            return response()->json([
                'status' => true,
                'msg' => 'تم اضافة المنتج بنجاح',
                'count' => $count
            ]);
        else
            return response()->json([
                'status' => false,
                'msg' => 'فشل الحفظ برجاء المحاولة مجددا',


            ]);
    }




    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //$name = Arr::pull($array, 'name');
        $array_id = Cookie::get('id_product');

        if ($array_id) {
            $array_id = json_decode($array_id);
            if (($key = array_search($request->id, $array_id)) !== false) {
                $new = Arr::pull($array_id, $key);
            }
            Cookie::queue('id_product',  json_encode($array_id), 60 * 24 * 7);
            $response = new Response('product wishlist');
            $response->withCookie(cookie('id_product',  json_encode($new), 60 * 24 * 7));

            $id = Cookie::get('id_product');
            $id = json_decode($id);
            $count = count($id);
        }
        if ($response)
            return response()->json([
                'status' => true,
                'msg' => 'تم الغاء المنتج بنجاح',
                'id' => $request->id,
                'count' => $count
            ]);
        else
            return response()->json([
                'status' => false,
                'msg' => 'فشل في الإلغاء برجاء المحاولة مجددا',


            ]);
    }

    public function addcart(Request $request)
    {

        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'int|min:1',
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

            // remove product from wish list after add it to cart
            $array_id = Cookie::get('id_product');

            if ($array_id) {
                $array_id = json_decode($array_id);
                if (($key = array_search($request->product_id, $array_id)) !== false) {
                    $new = Arr::pull($array_id, $key);
                }
                Cookie::queue('id_product',  json_encode($array_id), 60 * 24 * 7);
                $response = new Response('product wishlist');
                $response->withCookie(cookie('id_product',  json_encode($new), 60 * 24 * 7));

                $id = Cookie::get('id_product');
                $id = json_decode($id);
                $count = count($id);
            }

            if ($cart)
                return response()->json([
                    'status' => true,
                    'msg' => 'تم اضافة المنتج  بنجاح',
                    'count' => $count,
                    'id' => $request->product_id,
                ]);
            else
                return response()->json([
                    'status' => false,
                    'msg' => 'فشل الحفظ برجاء المحاولة مجددا',


                ]);
        }

        // return redirect()->back()->with('success', " تم اضافة المنتج بنجاح");
    }
}
