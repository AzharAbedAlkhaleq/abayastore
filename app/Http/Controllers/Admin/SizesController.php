<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Size;
use Illuminate\Http\Request;

class SizesController extends Controller
{
    public function index(){
        $sizes=Size::paginate(5);
        return view('admin.size.index',compact('sizes'));
    }
    public function create(){
       
          return view('admin.size.create');
      }
      public function store(Request $request){
          //dd($request->all());
          $request->validate([
            'size'=>'required|unique:sizes,size|max:50|min:2',
          ],[
              'size.required'=>'مطلوب ',
              'size.unique' =>'اللون موجود',

          
          ]);

         $sizes=new Size();
          $sizes->size=$request->input('size');

          $sizes->status=$request->input('status') == true? '1':'0';
          $sizes->save();
        return redirect()->route('sizes')->with('status','تمت الإضافة!');


      }
      public function edit($id){
        $size = Size::find($id);

        return view('admin.size.edit',compact('size'));
    }
      public  function update(Request $request,$id)
      {
          
       $size = Size::find($id);

       $size->size=$request->input('size');

       $size->status=$request->input('status') == true? '1':'0';
       $size->update();
       return redirect( route('sizes'))->with('status','تم التعديل بنجاح!');
      }
      public function delete($id){
        $size= Size::find($id);
       
        $size->delete();
        return redirect()->back()->with('status','تم الحذف!');          }
}
