<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class BannerController extends Controller
{
    public function index(){
        $banners=Banner::paginate(8);
        return view('admin.banner.index',compact('banners')); 
      }

      public function create(){
        $category=Category::all();
        $product=Product::all();
        return view('admin.banner.create',compact('category','product'));
      }
      public function store(Request $request){
       //dd($request->all());
        $banner= new Banner();
        if($request->hasFile('banner_image')){
            $file=$request->file('banner_image');
            $ext= $file->getClientOriginalExtension();
            $filename= time().'.'.$ext;
            $file->move('assets/uploads/banners',$filename);
            $banner->banner_image=$filename;
            
        }
        $banner->link=$request->input('link');
        $banner->location=$request->input('location');

        $banner->save();
              return redirect()->route('homebanner')->with('status','تمت الإضافة!');
      }
      //------------------------ update Banner-----------------------------

      public function edit($id){
        $banner= Banner::find($id);
        return view('admin.banner.edit',compact('banner'));

      }
      public  function update(Request $request,$id)
{
 $banner =Banner::find($id);
 
     if($request->hasFile('banner_image')){

      $path='assets/uploads/banners/'.$banner->banner_image;
      if(File::exists($path))
      {
           File::delete($path);
      }
    }
    //dd($request->all());
      $file=$request->file('banner_image');
      $ext= $file->getClientOriginalExtension();
      $filename= time().'.'.$ext;
      $file->move('assets/uploads/banner_image',$filename);
      $banner->banner_image=$filename;

     $banner->location=$request->input('location');
    $banner->link=$request->input('link');
     $banner->update();
     return redirect( route('homebanner'))->with('status','تمت عملية التعديل بنجاح!');
  }
     
      //--------------------Delete Banner----------------------------------
      
      public function delete($id){

        $banner= Banner::find($id);
      if($banner->banner_image)
      {
  
          $path='assets/uploads/banners/'.$banner->banner_image;
          if(File::exists($path))
          {
              
               File::delete($path);
          }
      }
    
      $banner->delete();
      return redirect()->back()->with('status','تم الحذف بنجاح!'); 
    
    }
}
