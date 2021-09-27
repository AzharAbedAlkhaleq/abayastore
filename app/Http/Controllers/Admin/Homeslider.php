<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HomeSlider as ModelsHomeSlider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class HomeSlider extends Controller
{
  public function index(){

    $sliders = ModelsHomeSlider::paginate(5);
      return view('admin.homeSlider.index',compact('sliders'));
  }

public function create(){

  return view('admin.homeSlider.create');
}
public function store(Request $request){
  $request->validate([
      'type'=>'required',
      'status'=>'required',
    
      'imageSlider'=>'required',
  ],[
      'type.required'=>'رجاءاً, ادخل مكان السلايدر',
      'status.required'=>'رجاءاً, ادخل  الحالة',
      'imageSlider.required'=>'رجاءاً, ادخل صورة السلايدر',
  ]);
  $slider= new ModelsHomeSlider();

  $slider->type=$request->input('type');
  $slider->title=$request->input('title');
  $slider->subtitle=$request->input('subtitle');
   $slider->link=$request->input('link');
  // $slider->price=$request->input('price	');
  $slider->status=$request->input('status');
  $filename = saveImage($request->file('imageSlider') , 'assets/uploads/Slider');
    $slider->imageSlider=$filename;
  $slider->save();
        return redirect()->route('homeslider')->with('status','تمت الإضافة!');
}
public function edit($id){
  $slider = ModelsHomeSlider::find($id);

  return view('admin.homeSlider.edit',compact('slider'));
}



public  function update(Request $request,$id)
{
    $request->validate([
        'type'=>'required',
        'status'=>'required',
      
    ],[
        'type.required'=>'رجاءاً, ادخل مكان السلايدر',
        'status.required'=>'رجاءاً, ادخل  الحالة',
        
    ]);
 $slider = ModelsHomeSlider::find($id);
      $slider->type=$request->input('type');
     $slider->title=$request->input('title');
     $slider->subtitle=$request->input('subtitle');
    $slider->link=$request->input('link');
    $slider->status=$request->input('status');
    $slider->update();
    if($request->hasFile('imageSlider')){
        $path='assets/uploads/Slider/'.$slider->imageSlider;
        if(File::exists($path))
        {
            File::delete($path);
        }
        $filename = saveImage($request->file('imageSlider') , 'assets/uploads/Slider');
        $slider->imageSlider=$filename;
        $slider->update();
    }


     return redirect( route('homeslider'))->with('status','تمت عملية التعديل بنجاح!');

}
public function delete($id){
  $slider= ModelsHomeSlider::find($id);


  if($slider->imageSlider)
  {
      $path='assets/uploads/Slider/'.$slider->imageSlider;
      if(File::exists($path))
      {

           File::delete($path);
      }
  }

  $slider->delete();
  return redirect()->back()->with('status','تم الحذف بنجاح!');

}
}
