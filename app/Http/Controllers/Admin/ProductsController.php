<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use App\Models\Size;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Symfony\Component\Console\Input\Input;

class ProductsController extends Controller
{
  public function index(){
    $products=Product::paginate(7);
      return view('admin.products.index',compact('products'));

  }
  public function create(){
    $category=Category::all();
    $color=Color::all();
    $size=Size::all();
      return view('admin.products.create',compact('category','color','size'));
  }

  public function store(Request $request){

    $product= new Product();
        if($request->hasFile('image_ar')){
            $file=$request->file('image_ar');
            $ext= $file->getClientOriginalExtension();
            $filename= time().'.'.$ext;
            $file->move('assets/uploads/product_ar',$filename);
            $product->image_ar=$filename;
            
        }
      
        
        //upload vedio 
        if($request->hasFile('video')){
          $file=$request->file('video');
          $ext= $file->getClientOriginalExtension();
          $filename= time().'.'.$ext;
          $file->move('assets/uploads/videos',$filename);
          $product->video=$filename;

        }


        $product->category_id=$request->input('category_id');
        $product->color_id=$request->input('color_id');
        $product->size_id=$request->input('size_id');
        $product->name_ar=$request->input('name_ar');
        $product->slug_ar=Str::slug($request->name_ar);
        $product->code=$request->input('code');
        $product->small_desc_ar=$request->input('small_desc_ar');
        $product->description_ar=$request->input('description_ar');
        $product->name_en=$request->input('name_en');
        $product->slug_en=Str::slug($request->name_en);
        $product->small_desc_en=$request->input('small_desc_en');
        $product->description_en=$request->input('description_en');
        $product->orginal_price=$request->input('orginal_price');
        $product->Selling_price=$request->input('Selling_price');
        $product->quantity=$request->input('quantity');
        $product->tax=$request->input('tax');
        //$product->views=$request->input('views');
        $product->status=$request->input('status') == true? '1':'0';
        $product->trending=$request->input('trending')  == true? '1':'0';
        $product->save();
        return redirect()->route('products')->with('status','تمت الإضافى بنجاح!');
     
  }
  public function edit($id){
    $product=Product::find($id);
    return view('admin.products.edit',compact('product'));
  }

  //Update Product



public  function update(Request $request,$id)

{

 // dd($request->all());
 $product = product::find($id);

 //--------------------------Arabic Image-----------------------------------
 if($request->hasFile('image_ar')){
 
  $path='assets/uploads/product_ar/'.$product->image_ar;
  if(File::exists($path))
  {
       File::delete($path);
  }

  $file=$request->file('image_ar');
  $ext= $file->getClientOriginalExtension();
  $filename= time().'.'.$ext;
  $file->move('assets/uploads/product_ar',$filename);
  $product->image_ar=$filename;
}

 //-------------------------------English image----------------------------
if($request->hasFile('image_en')){
  $path='assets/uploads/product_en/'.$product->image_en;
  if(File::exists($path))
  {
       File::delete($path);
  }
     $file=$request->file('image_en');
     $ext= $file->getClientOriginalExtension();
     $filename= time().'.'.$ext;
     $file->move('assets/uploads/product_en',$filename);
     $product->image_en=$filename;
     }
     //------------------------------Banner Image---------------------------


// if($request->hasFile('banner')){
//   $path='assets/uploads/banner/'.$product->image_en;
//   if(File::exists($path))
//   {
//        File::delete($path);
//   }
//      $file=$request->file('banner');
//      $ext= $file->getClientOriginalExtension();
//      $filename= time().'.'.$ext;
//      $file->move('assets/uploads/banner',$filename);
//      $product->banner=$filename;
//      }

     
    //--------------------video---------------------------------------

     if($request->hasFile('video')){
         $path= 'assets/uploads/videos/'.$product->video;

         if(File::exists($path))
         {
             
              File::delete($path);
         }
         
         $file=$request->file('video');
         $ext= $file->getClientOriginalExtension();
         $filename= time().'.'.$ext;
         $file->move('assets/uploads/videos',$filename);
          $product->video=$filename;
        }
     
        $product->category_id=$request->input('category_id');
        $product->color_id=$request->input('color_id');
        $product->size_id=$request->input('size_id');
        $product->name_ar=$request->input('name_ar');
        $product->slug_ar=Str::slug($request->name_ar);
        $product->code=$request->input('code');
        $product->small_desc_ar=$request->input('small_desc_ar');
        $product->description_ar=$request->input('description_ar');
        $product->name_en=$request->input('name_en');
        $product->slug_en=Str::slug($request->name_en);
        $product->small_desc_en=$request->input('small_desc_en');
        $product->description_en=$request->input('description_en');
        $product->orginal_price=$request->input('orginal_price');
        $product->Selling_price=$request->input('Selling_price');
        $product->quantity=$request->input('quantity');
        $product->tax=$request->input('tax');
        //$product->views=$request->input('views');
        $product->status=$request->input('status') == true? '1':'0';
        $product->trending=$request->input('trending')  == true? '1':'0';
     $product->update();
     return redirect( route('products'))->with('success','تمت عملية التعديل بنجاح!');

}


  //Delete Product
  public function delete($id){
    
    $product= Product::find($id);

    if($product->image_ar)
    {
        $path='assets/uploads/product_ar/'.$product->image_ar;
        if(File::exists($path))
        {
            
             File::delete($path);
        }
    }
    //-----------------------delete english image----------------
    // if($product->image_en)
    // {
    //     $path= 'assets/uploads/product_en/'.$product->image_en;

    //     if(File::exists($path))
    //     {
            
    //          File::delete($path);
    //     }
    // }
//---------------------------delete banner--------------
// if($product->banner)
// {
//     $path= 'assets/uploads/banner/'.$product->image_en;

//     if(File::exists($path))
//     {
        
//          File::delete($path);
//     }
// }

    //---------------delete video------------------
    if($product->video)
    {
        $path= 'assets/uploads/videos/'.$product->video;

        if(File::exists($path))
        {
            
             File::delete($path);
        }
    }

    $product->delete();
    return redirect()->back()->with('status','تم الحذف!!');          
  }

}
