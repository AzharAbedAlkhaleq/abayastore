<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

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
        if($request->hasFile('image_en')){
            $file=$request->file('image_en');
            $ext= $file->getClientOriginalExtension();
            $filename= time().'.'.$ext;
            $file->move('assets\uploads\Category_en',$filename);
            $category->image_en=$filename;
        }
        $category->name_ar=$request->input('name_ar');
        $category->slug_ar=$request->input('slug_ar');
        $category->name_en=$request->input('name_en');
        $category->slug_en=$request->input('slug_en');
        $category->small_desc_ar=$request->input('small_desc_ar');
        $category->small_desc_en=$request->input('small_desc_en');
        $category->description_ar=$request->input('description_ar');
        $category->description_en=$request->input('description_en');
        $category->status=$request->input('status') == true? '1':'0';
        $category->popular=$request->input('popular')  == true? '1':'0';

        $category->save();
        return redirect()->route('categories')->with('status','Category Added Successfully!');
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
            if($request->hasFile('image_en')){
                $path= 'assets/uploads/Category_en/'.$category->image_en;

                if(File::exists($path))
                {
                    
                     File::delete($path);
                }
                
                $file=$request->file('image_en');
                $ext= $file->getClientOriginalExtension();
                $filename= time().'.'.$ext;
                $file->move('assets\uploads\Category_en',$filename);
                $category->image_en=$filename;
            }
            
            $category->name_ar=$request->input('name_ar');
            $category->slug_ar=$request->input('slug_ar');
            $category->name_en=$request->input('name_en');
            $category->slug_en=$request->input('slug_en');
            $category->small_desc_ar=$request->input('small_desc_ar');
            $category->small_desc_en=$request->input('small_desc_en');
            $category->description_ar=$request->input('description_ar');
            $category->description_en=$request->input('description_en');
            $category->status=$request->input('status') == true? '1':'0';
            $category->update();
            return redirect( route('categories'))->with('status','Category Updated Successfully!');
    
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
           if($category->image_en)
           {
               $path= 'assets/uploads/Category_en/'.$category->image_en;

               if(File::exists($path))
               {
                   
                    File::delete($path);
               }
           }

           $category->delete();
           return redirect()->back()->with('status','Category Deleted Successfully!');          }
    }