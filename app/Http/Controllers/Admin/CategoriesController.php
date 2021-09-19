<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class CategoriesController extends Controller
{
  public function index(){
      $categories=Category::paginate(7);
      return view('admin.category.index',compact('categories'));

      }
      public function create(){
          return view('admin.category.create');
      }
      public function store(Request $request){
        $category= new Category();
        if($request->hasFile('image_ar')){
            $file=$request->file('image_ar');
            $ext= $file->getClientOriginalExtension();
            $filename= time().'.'.$ext;
            $file->move('assets\uploads\Category_ar',$filename);
            $category->image_ar=$filename;
            
        }
        
        $category->name_ar=$request->input('name_ar');
        $category->slug_ar=Str::slug($request->name_ar);
        $category->name_en=$request->input('name_en');
        $category->slug_en=Str::slug($request->name_en);
        $category->status=$request->input('status') == true? '1':'0';
        $category->save();
        return redirect()->route('categories')->with('status','تمت عملية الإضافة');
       }

       //----------------------------------------Update Ctegory-----------------------------
       public function edit($id){
           $category = Category::find($id);

           return view('admin.category.edit',compact('category'));
       }
       
       public  function update(Request $request,$id)
       {
           
        $category = Category::find($id);
        if($request->hasFile('image_ar')){
 
            $path='assets/uploads/Category_ar/'.$category->image_ar;
            if(File::exists($path))
            {
                 File::delete($path);
            }

            $file=$request->file('image_ar');
            $ext= $file->getClientOriginalExtension();
            $filename= time().'.'.$ext;
            $file->move('assets\uploads\Category_ar',$filename);
            $category->image_ar=$filename;

            }
           
            $category->name_ar=$request->input('name_ar');
            $category->slug_ar=Str::slug($request->name_ar);
            $category->name_en=$request->input('name_en');
            $category->slug_en=Str::slug($request->name_en);
            $category->status=$request->input('status') == true? '1':'0';
            $category->update();
            return redirect( route('categories'))->with('status','تم التعديل بنجاح!');
    
      }
         //-------------------------------------delete Category----------------------------------
          public function delete($id){
           $category= Category::find($id);
           if($category->image_ar)
           {
               $path='assets/uploads/Category_ar/'.$category->image_ar;
               if(File::exists($path))
               {
                   
                    File::delete($path);
               }
           }

           $category->delete();
           return redirect()->back()->with('status','تم الحذف!');          }
    }