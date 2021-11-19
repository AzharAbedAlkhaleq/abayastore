<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use App\Models\ProductColors;
use App\Models\ProductImage;
use App\Models\ProductSizes;
use App\Models\Size;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Symfony\Component\Console\Input\Input;
use function GuzzleHttp\Promise\all;

class ProductsController extends Controller
{
  public function index(){
    $products=Product::paginate(7);
      return view('admin.products.index',compact('products'));

  }
  public function create(){
    $category=Category::all();
    $colors = Color::all();
    $sizes = Size::all();
      return view('admin.products.create',get_defined_vars());
  }

  public function store(Request $request){
    //    dd($request->all());
  $request->validate([
   'category_id'=>'required',
   'code'=>'required|unique:products,code',
   'name_ar'=>'required|min:3|max:100|unique:products,name_ar',
   'name_en'=>'required|min:3|max:100|unique:products,name_en',
   'small_desc_ar'=>'required',
   'small_desc_en'=>'required',
   'description_ar'=>'required',
   'description_en'=>'required',
   'orginal_price'=>'required',
   'Selling_price'=>'sometimes',
   'quantity'=>'required',
   'weight'=>'required',
   'tax'=>'sometimes',
   'image_ar' =>'required',
   'images' =>'required',
   'status'=>'required|in:1,0',
 ],[
 'name_ar.required'=>'مطلوب!، الرجاء إدخال اسم المنتج',
 'category_id.required'=>'مطلوب!، الرجاء إدخال الفئة',
 'code.required'=>'مطلوب!، الرجاء إدخال الكود',
 'code.unique'=>'الرقم موجود , الرجاء إدخال رقم آخر',
 'small_desc_ar.required'=>'مطلوب!، الرجاء إدخال الوصف بالعربي',
 'small_desc_en.required'=>'مطلوب!، الرجاء إدخال الوصف باللغة الإنجليزية',
 'description_en.required'=>'مطلوب!، الرجاء إدخال التفاصيل باللغة الإنجليزية',
 'description_ar.required'=>'مطلوب!، الرجاء إدخال التفاصيل بالعربي',
 'name_ar.unique'=>' هذا الاسم موجود بالفعل ، رجاءا أدخل اسم آخر',
 'name_ar.min'=>' يجب ألا يقل الاسم عن ثلاثة احرف',
 'name_ar.max'=>' يجب ألا يزيد الاسم عن مائة حرف',
 'name_en.unique'=>' هذا الاسم موجود بالفعل ، رجاءا أدخل اسم آخر',
 'name_en.required'=>'مطلوب!، الرجاء إدخال اسم الفئة',
 'name_en.min'=>' يجب ألا يقل الاسم عن ثلاثة احرف',
 'name_en.max'=>' يجب ألا يزيد الاسم عن مائة حرف',
 'orginal_price.required'=>'يجب ادخال السعر الاصلي',
 'Selling_price.required'=>'يجب ادخال نسبة الخصم ',
 'quantity.required'=>'يجب ادخال الكمية ',
 'weight.required'=>'يجب ادخال الوزن ',
 'tax.required'=>'يجب ادخال الضريبة ',
 'image_ar.required'=>'يجب ادخال الصورة ',
 'images.required'=>'يجب ادخال مجموعة الصور ',
 'status.required' => 'يجب إدخال الحالة',
 ]);
    $product= new Product();

        $product->category_id= $request->input('category_id');
//$product['color_id'] = json_encode($input['color_id']);
//$product['size_id']=json_encode($input['size_id']);
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
        $product->quantity=$request->input('quantity');
        $product->weight=$request->input('weight');
        if ($request->tax != null){
            $product->tax=$request->input('tax');
        }else{
            $product->tax = 5;
        }
        if ($request->Selling_price != null){
            $product->Selling_price=$request->input('Selling_price');
        }else{
            $product->Selling_price = 0;
        }
        $product->status=$request->input('status') == true? '1':'0';
        $product->trending=$request->input('trending')  == true? '1':'0';

      if($request->hasFile('image_ar')){
          $filename = saveImage($request->file('image_ar'),'assets/uploads/product');
          $product->image_ar = $filename;
          $product->save();
      }
      //upload video
      if($request->hasFile('video')){
          $filename = saveImage($request->file('video'),'assets/uploads/videos');
          $product->video=$filename;
          $product->save();
      }
      $product->save();
      if ($request->hasFile('images')){
          $images = $request->images;
          foreach ($images as $image){
              $product_images = new ProductImage();
              $product_images->product_id = $product->id;
              $file_name = saveImage($image , 'assets/uploads/product/');
              $product_images->filename = $file_name;
              $product_images->save();
          }
      }

      foreach ($request->sizes as $size){
          $new_size = new ProductSizes();
          $new_size->product_id = $product->id;
          $new_size->size_id = $size;
          $new_size->save();

      }
      foreach ($request->colors as $new_color){
          $new_colors = new ProductColors();
          $new_colors->product_id = $product->id;
          $new_colors->color_id = $new_color;
          $new_colors->save();
      }

        return redirect()->route('products')->with('status','تمت الإضافة بنجاح!');

  }
  public function edit($id){
    $category=Category::all();
    $product=Product::where('id',$id)->with('color','size')->first();
      $colors = Color::all();
      $sizes = Size::all();
    
        return view('admin.products.edit',get_defined_vars());
  }

  //Update Produc
public  function update(Request $request,$id)
{
    // $request->validate([
    //     'category_id'=>'required',
    //     'code'=>'required|unique:products,code',
    //     'name_ar'=>'required|min:3|max:100|unique:products,name_ar',
    //     'name_en'=>'required|min:3|max:100|unique:products,name_en',
    //     'small_desc_ar'=>'required',
    //     'small_desc_en'=>'required',
    //     'description_ar'=>'required',
    //     'description_en'=>'required',
    //     'orginal_price'=>'required',
    //     'Selling_price'=>'sometimes',
    //     'quantity'=>'required',
    //     'tax'=>'sometimes',
    //     'image_ar' =>'required',
    //     'images' =>'required',
    //     'status'=>'required|in:1,0',
    //   ],[
    //   'name_ar.required'=>'مطلوب!، الرجاء إدخال اسم المنتج',
    //   'category_id.required'=>'مطلوب!، الرجاء إدخال الفئة',
    //   'code.required'=>'مطلوب!، الرجاء إدخال الكود',
    //   'code.unique'=>'الرقم موجود , الرجاء إدخال رقم آخر',
    //   'small_desc_ar.required'=>'مطلوب!، الرجاء إدخال الوصف بالعربي',
    //   'small_desc_en.required'=>'مطلوب!، الرجاء إدخال الوصف باللغة الإنجليزية',
    //   'description_en.required'=>'مطلوب!، الرجاء إدخال التفاصيل باللغة الإنجليزية',
    //   'description_ar.required'=>'مطلوب!، الرجاء إدخال التفاصيل بالعربي',
    //   'name_ar.unique'=>' هذا الاسم موجود بالفعل ، رجاءا أدخل اسم آخر',
    //   'name_ar.min'=>' يجب ألا يقل الاسم عن ثلاثة احرف',
    //   'name_ar.max'=>' يجب ألا يزيد الاسم عن مائة حرف',
    //   'name_en.unique'=>' هذا الاسم موجود بالفعل ، رجاءا أدخل اسم آخر',
    //   'name_en.required'=>'مطلوب!، الرجاء إدخال اسم الفئة',
    //   'name_en.min'=>' يجب ألا يقل الاسم عن ثلاثة احرف',
    //   'name_en.max'=>' يجب ألا يزيد الاسم عن مائة حرف',
    //   'orginal_price.required'=>'يجب ادخال السعر الاصلي',
    //   'Selling_price.required'=>'يجب ادخال نسبة الخصم ',
    //   'quantity.required'=>'يجب ادخال الكمية ',
    //   'tax.required'=>'يجب ادخال الضريبة ',
    //   'image_ar.required'=>'يجب ادخال الصورة ',
    //   'images.required'=>'يجب ادخال مجموعة الصور ',
    //   'status.required' => 'يجب إدخال الحالة',
    // ]);
 $product = product::where('id',$id)->with('images','color','size')->first();
        $input = $request->all();
        $product->category_id=$request->input('category_id');
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
        $product->quantity=$request->input('quantity');
        $product->status=$request->input('status') == true? '1':'0';
        $product->trending=$request->input('trending')  == true? '1':'0';
        if ($request->tax != null){
            $product->tax=$request->input('tax');
            $product->update();
        }else{
            $product->tax = 5;
            $product->update();

        }
        if ($request->Selling_price != null){
            $product->Selling_price=$request->input('Selling_price');
            $product->update();

        }else{
            $product->Selling_price = 0;
            $product->update();
        }

    if($request->hasFile('image_ar')){
        $path='assets/uploads/product/'.$product->image_ar;
        if(File::exists($path))
        {
            File::delete($path);
        }
        $filename = saveImage($request->file('image_ar'),'assets/uploads/product');
        $product->image_ar = $filename;
        $product->update();
    }
    //upload video
    if($request->hasFile('video')){
        $path= 'assets/uploads/videos/'.$product->video;
        if(File::exists($path))
        {
            File::delete($path);
        }
        $filename = saveImage($request->file('video'),'assets/uploads/videos');
        $product->video=$filename;
        $product->update();
    }
    if ($request->hasFile('images')){
        $path='assets/uploads/product/'.$product->image_ar;
        if(File::exists($path))
        {
            File::delete($path);
        }
        $images = $request->images;
        foreach ($images as $image){
            $file_name = saveImage($image ,'assets/uploads/product/');
            $product_images = $product->images()->update([
                'filename'=>$image,
            ]);
        }
    }
    if ($request->has('sizes')){
        $old_sizes = ProductSizes::where('product_id',$product->id)->get();
        foreach ($old_sizes as $old){
            $old->delete();
        }
        foreach ($request->sizes as $size){
            $new_size = new ProductSizes();
            $new_size->product_id = $product->id;
            $new_size->size_id = $size;
            $new_size->save();

        }
    }

  if ($request->has('colors')){
      $old_colors = ProductColors::where('product_id',$product->id)->get();
      foreach ($old_colors as $old){
          $old->delete();
      }
      foreach ($request->colors as $new_color){
          $new_colors = new ProductColors();
          $new_colors->product_id = $product->id;
          $new_colors->color_id = $new_color;
          $new_colors->save();
      }

  }
    $product->update();
     return redirect( route('products'))->with('success','تمت عملية التعديل بنجاح!');

}


  //Delete Product
  public function delete($id){

    $product= Product::find($id);

    if($product->image_ar)
    {
        $path='assets/uploads/product/'.$product->image_ar;
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
  public function search(Request $request){
    $search=$request->search;
    $products=Product::where('name_ar','like','%'.$search.'%')->orWhere('name_en','like','%'.$search.'%')->paginate(5);
    return view('admin.products.index',compact('products'));

  }

}
