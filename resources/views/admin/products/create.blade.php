@extends('admin.layouts.app')
@section('content')
<div class="card">
  <div  class="card-header">
    <h1 style=" color:rgb(151, 35, 35); text-align:center; font-size:50px;margin-top:20px">{{ trans('admin.add product')}} </h1>
</div>
<div>

    <div class="card-body">
        <div style="position: relative; top: 20px; right: -20px">
          <a style="margin-bottom: 20px;" href="{{ route('products') }}" class="btn btn-primary btn-lg"><span style="text-align: center">{{ trans('admin.Products') }}</span></a>

        <form action="{{ route('store-product') }}" method="POST" enctype="multipart/form-data">
            @csrf
          
            <div class="mb-3 row">
              <div class="col-md-12 mb-3">
                <label style="color: blue; font-size:25px"> <span style="color: red">*</span> {{ trans('admin.Categories') }} </label>
                <select  style=" font-size:20px"  class="form-select"  name="category_id">
                  <option value="">{{ trans('admin.Select the Category') }}</option>
                  @foreach ($category as $category)
                  <option value="{{ $category->id }}"> {{ $category->name_en }}</option>
                  <option value="{{ $category->id }}">{{ $category->name_ar }}</option>
                  @endforeach
                </select>
              </div>
{{-- 
                <div class="col-md-6 mb-3">
                  <select class="form-select" name="category_id">
                    <option value="">Select a Category</option>
                    @foreach ($category as $item)
                    <option value="{{ $item->id }}">{{ $item->name_en }}</option>
                    @endforeach
                  </select> --}}
            
              <div  class="col-md-6  mb-3">
                <label for="">{{ trans('admin.Arabic_Name') }}</label>
                <input style="font-family:Times New Roman; font-size:24px" type="text"  name="name_ar" class="form-control">
            </div>
            <div  class="col-md-6  mb-3">
              <label for="">{{ trans('admin.code') }}</label>
              <input style=" font-family:Times New Roman; font-size:24px" type="text"  name="code" class="form-control">
          </div>
          <div class=class="col-md-12 mb-3">
            <label for=""> {{ trans('admin.Small Arabic Description') }}</label>
            <div class="mb-3">
              <textarea  style="font-size: 20px; font-family:'Times New Roman', Times, serif" type="text" name="small_desc_ar" class="form-control" id="descrpt">
              </textarea>
            </div>
          </div>
          <div class=class="col-md-12 mb-3">
            <label for="descrpt"">{{ trans('admin.Arabic Description') }}</label>
            <div class="mb-3">
              <textarea  style="font-size: 20px; font-family:'Times New Roman', Times, serif" type="text" name="description_ar" class="form-control" id="descrpt">
              </textarea>
            </div>
          </div>
          
            <div  class="col-md-6 mb-5">
                <label for="">{{ trans('admin.English_Name') }}</label>
                <input style="font-family:Times New Roman; font-size:24px" type="text"  name="name_en" class="form-control">
            </div>
            
          <div class=class="col-md-12 mb-3">
            <label for=""> {{ trans('admin.Small English Description') }}</label>
            <div class="mb-3">
              <textarea  style="font-size: 20px; font-family:'Times New Roman', Times, serif" type="text" name="small_desc_en" class="form-control" id="descrpt">
              </textarea>
            </div>
          </div>
          <div class=class="col-md-12 mb-3">
            <label for="descrpt"">{{ trans('admin.English Description') }}</label>
            <div class="mb-3">
              <textarea  style="font-size: 20px; font-family:'Times New Roman', Times, serif" type="text" name="description_en" class="form-control" id="descrpt">
              </textarea>
            </div>
          </div>
        

            <div  class="col-md-6 mb-3">
              <label for="">{{ trans('admin.Orginal Price') }}</label>
              <input style="font-family:Times New Roman; font-size:24px" type="number"  name="orginal_price" class="form-control">
          </div>

          <div class="col-md-5  mb-3">
              <label for="">{{ trans('admin.Selling Price') }}</label>
              <input style=" font-family:Times New Roman;font-size:24px" placeholder="0" type="number" class="form-control" name="Selling_price">
          </div>
          <div style="padding-top: 50px;width:70px"  class=" col-md-1 mb-3  ff">
            %
          </div>
        
          <div  class="col-md-6 mb-3">
            <label for="">{{ trans('admin.Quantity') }}</label>
            <input style="font-family:Times New Roman; font-size:24px" type="number"  name="quantity" class="form-control">
        </div>

        <div class="col-md-5 mb-3">
            <label for="">{{ trans('admin.Tax') }}</label>
            <input style=" font-family:Times New Roman;font-size:24px; display:inline;" placeholder="5" type="number" class="form-control" name="tax">
      
          </div>
          <div style="padding-top: 50px;width:70px" class=" col-md-1 mb-3  ff">
            %
          </div>

        {{-- <div class=" col-md-12 mb-3 ">
          <label for="view" class="col-sm-2 col-form-label">Views</label>
          <div class="">
            <input  style="font-size: 20px; font-family:'Times New Roman', Times, serif"  type="number" name="views" class="form-control" id="view">
          </div>
        </div> --}}

            <div  class="form-group mb-3">
                <label for="">{{ trans('admin.Arabic_Image') }}</label> 
                <input style="color:#0090E7; font-size:24px" type="file"  name="image_ar" class="form-control">
            </div>

            <div class="form-group mb-3">
                <label for="">{{ trans('admin.English_Image') }}</label> 
                <input type="file" style="color:#0090E7; font-size:24px" name="image_en" class="form-control">
            </div>
        

            {{-- <div class="form-group mb-3">
              <label for="">{{ trans('admin.banner Image') }}</label> 
              <input type="file" style="color:#0090E7; font-size:24px" name="	banner" class="form-control">
          </div> --}}


            <div  class="form-group mb-3">
              <label for="">{{ trans('admin.choose Video') }}</label> 
              <input style="color:#0090E7; font-size:24px" type="file"  name="video" class="form-control">
          </div>
          <div class="col mb-3">
            <input type="checkbox"  name="status">
            <label for="">{{ trans('admin.normal') }}</label>
            
        </div>
       
        <div class="col mb-3">
           
            <input type="checkbox"  name="trending">
            <label for="">{{ trans('admin.Popular') }}</label>
        </div>
     
            <div class="form-group mb-3">
                <button type="submit" class="btn btn-primary  btn-lg"> {{ trans('admin.add product') }} </button>
            </div>

           </div>
        </form>
     
@endsection