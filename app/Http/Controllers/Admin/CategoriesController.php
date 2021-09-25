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
      $categories=Category::paginate(5);
      return view('admin.category.index',compact('categories'));

      }
      public function create(){
          return view('admin.category.create');
      }
      public function store(Request $request){
//          dd($request->all());
         $request->validate([
           'name_ar'=>'required|min:3|max:100|unique:categories,name_ar',
           'name_en'=>'required|min:3|max:100|unique:categories,name_en',
           'image_ar' =>'required|image',
           'status'=>'required',
         ],[
         'name_ar.required'=>'مطلوب!، الرجاء إدخال اسم الفئة',
         'name_ar.unique'=>' هذا الاسم موجود بالفعل ، رجاءا أدخل اسم آخر',
         'name_ar.min'=>' يجب ألا يقل الاسم عن ثلاثة احرف',
         'name_ar.max'=>' يجب ألا يزيد الاسم عن مائة حرف',
         'name_en.unique'=>' هذا الاسم موجود بالفعل ، رجاءا أدخل اسم آخر',
         'name_en.required'=>'مطلوب!، الرجاء إدخال اسم الفئة',
         'name_en.min'=>' يجب ألا يقل الاسم عن ثلاثة احرف',
         'name_en.max'=>' يجب ألا يزيد الاسم عن مائة حرف',
         'status.required' => 'يجب إدخال الحالة',
         'image_ar.required'=>'الصورة مطلوبة',
         ]);
        $category= new Category();
        if($request->hasFile('image_ar')){
            $filename = saveImage($request->file('image_ar'),'assets/uploads/Category_ar');
            $category->image_ar = $filename;
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

       public  function update(Request $request)
       {
//           dd($request->all());

        $request->validate([
            'name_ar'=>'required|min:3|max:100',
            'name_en'=>'required|min:3|max:100',
            'status'=>'required|in:1,0',
          ],[
          'name_ar.required'=>'مطلوب!، الرجاء إدخال اسم الفئة',
          'name_ar.unique'=>' هذا الاسم موجود بالفعل ، رجاءا أدخل اسم آخر',
          'name_ar.min'=>' يجب ألا يقل الاسم عن ثلاثة احرف',
          'name_ar.max'=>' يجب ألا يزيد الاسم عن مائة حرف',
          'name_en.unique'=>' هذا الاسم موجود بالفعل ، رجاءا أدخل اسم آخر',
          'name_en.required'=>'مطلوب!، الرجاء إدخال اسم الفئة',
          'name_en.min'=>' يجب ألا يقل الاسم عن ثلاثة احرف',
          'name_en.max'=>' يجب ألا يزيد الاسم عن مائة حرف',
          'status.required' => 'يجب إدخال الحالة',
        //   'image_ar.required'=>'الصورة مطلوبة',
          ]);

        $category = Category::where('id',$request->id)->first();
        //dd($category);


        if($request->hasFile('image_ar')){


            $path='assets/uploads/Category_ar/'.$category->image_ar;
            if(File::exists($path))
            {
                 File::delete($path);
            }
            $filename = saveImage($request->file('image_ar'),'assets/uploads/Category_ar');
            $category->image_ar = $filename;
            }

            $category->name_ar = $request->input('name_ar');
            $category->slug_ar = Str::slug($request->name_ar);
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
           return redirect()->back()->with('status','تم الحذف!');

          }

          public function search(Request $request){
            $search=$request->search;
            $categories=Category::where('name_ar','like','%'.$search.'%')->orWhere('name_en','like','%'.$search.'%')->paginate(5);
            return view('admin.category.index',compact('categories'));

          }
    }
