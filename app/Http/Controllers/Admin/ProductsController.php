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
    //$color=Color::all();
   // $size=Size::all();
      return view('admin.products.create',compact('category'));
  }

  public function store(Request $request){

  dd($request->all());
//  $request->validate([
//   'name_ar'=>'required|min:3|max:100|unique:categories,name_ar',
//   'name_en'=>'required|min:3|max:100|unique:categories,name_en',
//   'image_ar' =>'required|image',
//   'status'=>'required|in:1,0',
// ],[
// 'name_ar.required'=>'مطلوب!، الرجاء إدخال اسم المنتج',
// 'name_ar.unique'=>' هذا الاسم موجود بالفعل ، رجاءا أدخل اسم آخر',
// 'name_ar.min'=>' يجب ألا يقل الاسم عن ثلاثة احرف',
// 'name_ar.max'=>' يجب ألا يزيد الاسم عن مائة حرف',
// 'name_en.unique'=>' هذا الاسم موجود بالفعل ، رجاءا أدخل اسم آخر',
// 'name_en.required'=>'مطلوب!، الرجاء إدخال اسم الفئة',
// 'name_en.min'=>' يجب ألا يقل الاسم عن ثلاثة احرف',
// 'name_en.max'=>' يجب ألا يزيد الاسم عن مائة حرف',
// 'status.required' => 'يجب إدخال الحالة',
// 'image_ar.required'=>'الصورة مطلوبة',
// ]);
    $product= new Product();
        if($request->hasFile('image')){
            $file=$request->file('image');
            $ext= $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('assets/uploads/product',$filename);
            $product->image=$filename;
            
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
        $product->Selling_price=$request->input('Selling_price');
        $product->quantity=$request->input('quantity');
        $product->tax=$request->input('tax');
        //$product->views=$request->input('views');
        $product->status=$request->input('status') == true? '1':'0';
        $product->trending=$request->input('trending')  == true? '1':'0';
        $product->save();

        return redirect()->route('products')->with('status','تمت الإضافة بنجاح!');
     
  }
  public function edit($id){
    $category=Category::all();
    $product=Product::find($id);
    return view('admin.products.edit',compact('product'));
  }

  //Update Produc
public  function update(Request $request,$id)

{

 // dd($request->all());
 $product = product::find($id);
 $input = $request->all();

 //--------------------------Arabic Image-----------------------------------
 if($request->hasFile('image')){
 
  $path='assets/uploads/product/'.$product->image_ar;
  if(File::exists($path))
  {
       File::delete($path);
  }

  $file=$request->file('image');
  $ext= $file->getClientOriginalExtension();
  $filename= time().'.'.$ext;
  $file->move('assets/uploads/product',$filename);
  $product->image=$filename;
}

 
     
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
        $product['color_id'] = json_encode($input['color_id']);
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
     return response()->json->redirect( route('products'))->with('success','تمت عملية التعديل بنجاح!');

}


  //Delete Product
  public function delete($id){
    
    $product= Product::find($id);

    if($product->image)
    {
        $path='assets/uploads/product/'.$product->image;
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
