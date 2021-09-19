<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Color;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    public function index(){
        $colors=Color::paginate(5);
        return view('admin.color.index',compact('colors'));
    }
    public function create(){
       
          return view('admin.color.create');
      }
      public function store(Request $request){
          //dd($request->all());

         $color=new Color();
          $color->color=$request->input('color');

          $color->status=$request->input('status') == true? '1':'0';
          $color->save();
        return redirect()->route('colors')->with('status','تمت الإضافة!');


      }
      public function edit($id){
        $color = Color::find($id);

        return view('admin.color.edit',compact('color'));
    }
      public  function update(Request $request,$id)
      {
          
       $color = Color::find($id);

       $color->color=$request->input('color');

       $color->status=$request->input('status') == true? '1':'0';
       $color->update();
       return redirect( route('colors'))->with('status','تم التعديل بنجاح!');
      }
      public function delete($id){
        $color= Color::find($id);
       
        $color->delete();
        return redirect()->back()->with('status','تم الحذف!');        
      }


}
