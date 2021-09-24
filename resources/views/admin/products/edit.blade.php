@extends('admin.layouts.app')
@section('content')
<div class="card">
  <div class="card-header">
    <h1 style=" color:rgb(151, 35, 35); text-align:center; font-size:50px ;margin-top:20px"> {{ trans('admin.edit product') }} </h1>
</div>
<div>

    <div class="card-body">
        <div style="position: relative; top: 20px; right: -20px">
          <a style="margin-bottom: 20px;" href="{{ route('products') }}" class="btn btn-primary btn-lg"><span style="text-align: center">{{ trans('admin.main') }}</span></a>

        <form action="{{url('admin/update-product/'.$product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
         @method('PUT')
            <div class="mb-3 row">
              <div class="col-md-6 mb-3">
                <label style="color: blue; font-size:25px"> <span style="color: red">*</span> {{ trans('admin.Categories') }} </label>
                <select  style=" font-size:20px"  class="form-select" >
                  <option value="">{{ $product->category->name_en }}</option>
                  <option value="">{{ $product->category->name_ar }}</option>
                </select>
              </div>

              <div  class="col-md-6  mb-3">
                <label for="">{{ trans('admin.code') }}</label>
                <input style=" font-family:Times New Roman; " type="text"  name="code" class="form-control">
            </div>
              <div  class="col-md-6  mb-3">
                <label for="">{{ trans('admin.Arabic_Name') }}</label>
                <input style="font-family:Times New Roman; font-size:24px" type="text"  value="{{ $product->name_ar}}" name="name_ar" class="form-control">
            </div>
           
          <div class=class="col-md-12 mb-3">
            <label for=""> {{ trans('admin.Small Arabic Description') }}</label>
            <div class="mb-3">
              <textarea  style="font-size: 20px; font-family:'Times New Roman', Times, serif" type="text" value="{{ $product->small_desc_ar}}" name="small_desc_ar" class="form-control">
              </textarea>
            </div>
          </div>
          <div class=class="col-md-12 mb-3">
            <label for="descrpt"">{{ trans('admin.Arabic Description') }}</label>
            <div class="mb-3">
              <textarea  style="font-size: 20px; font-family:'Times New Roman', Times, serif" type="text"  value="{{ $product->description_ar}}" name="description_ar" class="form-control">
              </textarea>
            </div>
          </div>
          
            <div  class="col-md-6 mb-5">
                <label for="">{{ trans('admin.English_Name') }}</label>
                <input style="font-family:Times New Roman; font-size:24px" type="text"  value="{{$product->name_en}}" name="name_en" class="form-control">
            </div>
           
          <div class=class="col-md-12 mb-3">
            <label for="">{{trans('admin.Small English Description')}}</label>
            <div class="mb-3">
              <textarea  style="font-size: 20px; font-family:'Times New Roman', Times, serif" value="{{$product->small_desc_en}}" type="text" name="small_desc_en" class="form-control">
              </textarea>
            </div>
          </div>
          <div class=class="col-md-12 mb-3">
            <label for="descrpt"">{{ trans('admin.English Description') }}</label>
            <div class="mb-3">
              <textarea  style="font-size: 20px; font-family:'Times New Roman', Times, serif" value="{{$product->description_en}}" type="text" name="description_en" class="form-control" >
              </textarea>
            </div>
          </div>
        

            <div  class="col-md-6 mb-3">
              <label for="">{{ trans('admin.Orginal Price') }}</label>
              <input style="font-family:Times New Roman; font-size:24px" type="number"  value="{{$product->orginal_price}}"   name="orginal_price" class="form-control">
          </div>

          <div class="col-md-6  mb-3">
              <label for="">{{ trans('admin.Selling Price') }}</label>
              <input style=" font-family:Times New Roman;font-size:24px" type="number" placeholder="0"  value="{{$product->Selling_price}}"  class="form-control" name="Selling_price">
          </div>
          {{-- <div style="padding-top: 50px;width:70px"  class=" col-md-1 mb-3  ff">
            %
          </div> --}}
        
          <div  class="col-md-6 mb-3">
            <label for="">{{ trans('admin.Quantity') }}</label>
            <input style="font-family:Times New Roman; font-size:24px" type="number"  value="{{$product->quantity}}"  name="quantity" class="form-control">
        </div>

        <div class="col-md-6  mb-3">
            <label for="">{{ trans('admin.Tax') }}</label>
            <input style=" font-family:Times New Roman;font-size:24px" placeholder="5" type="number" value="{{ $product->tax }}" class="form-control" name="tax">
        </div>

        {{-- <div style="padding-top: 50px;width:70px"  class=" col-md-1 mb-3  ff">
          %
        </div> --}}
        @if($product->image_ar)
        <img style="width: 100px;height:100px" src="{{ asset('assets/uploads/product_ar/'.$product->image_ar) }}" alt="image">

        @endif
            <div  class="form-group mb-3">
                <label for="">{{ trans('admin.Image') }}</label> 
                <input style="color:#0090E7; font-size:24px" type="file"  name="image_ar" class="form-control">
            </div>
            
            
            {{-- @if($product->banner)
            <img style="width: 100px;height:100px" style="width: 100px" src="{{ asset('assets/uploads/banner/'.$product->banner) }}" alt="image">

            @endif
           <div class="form-group mb-3">
               <label for="">Banner Image</label> 
               <input type="file" style="color:#0090E7; font-size:24px" name="banner" class="form-control">
           </div> --}}
      
            @if($product->video)
            <video style="width:100px; hieght:100px" controls>
                <source src="{{ asset('assets/uploads/videos/'.$product->video) }}" type="video">
                </video> 
            @endif
            <div  class="form-group mb-3">
              <label for="">{{ trans('admin.choose Video') }}</label> 
              <input style="color:#0090E7; font-size:24px" type="file"  name="video" class="form-control">
          </div>

           
          <div class="col mb-3">
            <input type="checkbox"  {{ $product->status =="1" ? 'checked':''}} name="status">
            <label for="">{{ trans('admin.normal') }}</label>
            
        </div>
       
        <div class="col mb-3">
           
            <input type="checkbox" {{ $product->trending =="1" ? 'checked':''}}  name="trending">
            <label for="">{{ trans('admin.Popular') }}</label>
        </div>
     
            <div class="form-group mb-3">
                <button type="submit" class="btn btn-primary  btn-lg"> {{ trans('admin.edit product') }} </button>
            </div>

           </div>
        </form>
     
@endsection