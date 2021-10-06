<?php

namespace App\Http\Controllers\User;

use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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
        $id =  $id = Cookie::get('id_product');
        return( $id);
        $products = Product::where('id',$id)->get();
        return $products;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id =  $id = Cookie::get('id_product');
        if ($id) {
            $product = [$id ,$request->id];
            $array_json=json_encode($product);
        }
       
       else{
           $array_json = $request->id;
       }
        $id_product =  Cookie::queue('id_product', $array_json, 60 * 24 * 7);

       if($id_product)
            return response()->json([
                'status'=> true,
                'msg'=>'تم اضافة المنتج بنجاح',
                ]);
             else
                 return response()->json([
                     'status'=> false,
                     'msg'=>'فشل الحفظ برجاء المحاولة مجددا',
     
                 ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
