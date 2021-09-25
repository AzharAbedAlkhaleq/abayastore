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
                    <select  style=" font-size:20px"  class="form-select @error('category_id') is-invalid @enderror"   name="category_id">
                        <option value="">{{ trans('admin.Select the Category') }}</option>
                        @foreach ($category as $category)
                            <option value="{{ $category->id }}" {{$category->id == $product->category_id ? 'selected':''}}> {{ $category->name_en }}</option>
                            <option value="{{ $category->id }}" {{$category->id == $product->category_id ? 'selected':''}}>{{ $category->name_ar }}</option>
                        @endforeach
                    </select>
                    @error('category_id')
                    <p class="invalid-feedback">{{ $message }}</p>
                    @enderror
                </div>
                <div  class="col-md-6  mb-3">
                    <label for="">{{ trans('admin.code') }}</label>
                    <input style=" font-family:Times New Roman; " type="text"  name="code" class="form-control @error('code') is-invalid @enderror" value="{{$product->code}}">
                    @error('code')
                    <p class="invalid-feedback">{{ $message }}</p>
                    @enderror
                </div>

                <div  class="col-md-6  mb-3">
                    <label for="">{{ trans('admin.Arabic_Name') }}</label>
                    <input style="font-family:Times New Roman; " type="text"  name="name_ar" class="form-control @error('name_ar') is-invalid @enderror" value="{{$product->name_ar}}">
                    @error('name_ar')
                    <p class="invalid-feedback">{{ $message }}</p>
                    @enderror
                </div>


                <div  class="col-md-6 mb-3">
                    <label for="">{{ trans('admin.English_Name') }}</label>
                    <input style="font-family:Times New Roman; " type="text"  name="name_en" class="form-control @error('name_en') is-invalid @enderror" value="{{$product->name_en}}">
                    @error('name_en')
                    <p class="invalid-feedback">{{ $message }}</p>
                    @enderror
                </div>

                {{-- <div class="col-md-6 mb-4">
                  <label >{{ trans('admin.size') }} </label>

                  <select style=" color:rgb(151, 35, 35);font-size:22px"  id="framework"  class="form-control"  multiple="multiple"  name="size_id[]">
                          <option style="color:rgb(151, 35, 35);">{{ trans('admin.select the size') }}</option>

                          @foreach ($size as $size )
                          <option style="color: black" value="{{ $size->id }}">{{ $size->size }}</option>

                          @endforeach

                      </select>
                  </div> --}}

                {{-- <div class="col-md-6 mb-4">
                  <label >{{ trans('admin.color') }} </label>
                      <select style=" color:rgb(151, 35, 35);font-size:22px" class="form-control" multiple="multiple"  name="color_id[]">
                          <option style="color:rgb(151, 35, 35);">{{ trans('admin.select the color') }}</option>
                         @foreach ($color as $colorالتفاصيل باللغة الإنجليزية
        )
                         <option style="color: black" value="{{ $color->id }}">{{ $color->color }}</option>
                         @endforeach

                      </select>
                  </div> --}}



                <div class="col-md-6 mb-3">
                    <label for=""> {{ trans('admin.Arabic Description') }}</label>
                    <div class="mb-3">
              <textarea  style="font-size: 28px; font-family:'Times New Roman', Times, serif" id="small_desc_ar"  type="text" name="small_desc_ar" class="form-control @error('small_desc_ar') is-invalid @enderror">
              {{$product->small_desc_ar}}
              </textarea>
                        @error('small_desc_ar')
                        <p class="invalid-feedback">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <label >{{ trans('admin.Arabic Details') }}</label>
                    <div class="mb-3">
              <textarea  style="font-size: 28px; font-family:'Times New Roman', Times, serif" type="text" id="description_ar" name="description_ar" class="form-control @error('description_ar') is-invalid @enderror">
                           {{$product->description_ar}}

              </textarea>
                        @error('description_ar')
                        <p class="invalid-feedback">{{ $message }}</p>
                        @enderror
                    </div>
                </div>


                <div class="col-md-6 mb-3">
                    <label for=""> {{ trans('admin.English Description') }}</label>
                    <div class="mb-3">
              <textarea  style="font-size: 28px; font-family:'Times New Roman', Times, serif" type="text" name="small_desc_en" class="form-control @error('small_desc_en') is-invalid @enderror">
                                      {{$product->small_desc_en}}

              </textarea>
                        @error('small_desc_en')
                        <p class="invalid-feedback">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="descrpt">{{ trans('admin.English Details') }}</label>
                    <div class="mb-3">
              <textarea  style="font-size: 28px; font-family:'Times New Roman', Times, serif" type="text" name="description_en" class="form-control @error('description_en') is-invalid @enderror">
                  {{$product->description_en}}
              </textarea>
                        @error('description_en')
                        <p class="invalid-feedback">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6 ">
                    <label >الالوان</label>
                    <div class="mb-3">
                        @foreach($colors as $color)
                            <input class="@error('colors') is-invalid @enderror " name="colors[]" type="checkbox" id="{{$color->id}}" value="{{$color->id }}" {{in_array($color->id,$product->color()->pluck('id')->toArray()) ? 'checked' :''}}>
                            <label class="form-check-label" for="{{$color->id}}">{{$color->color}}</label>
                        @endforeach
                            @error('colors')
                            <p class="invalid-feedback">{{ $message }}</p>
                            @enderror
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="descrpt">الاحجام</label>
                    <div class="mb-3">
                        @foreach($sizes as $size)
                            <input class=" @error('sizes') is-invalid @enderror " name="sizes[]" type="checkbox" id="size_{{$size->id}}" value="{{$size->id }}" {{in_array($size->id , $product->size()->pluck('id')->toArray()) ? 'checked' :''}}>
                            <label class="form-check-label" for="size_{{$size->id}}">{{$size->size}}</label>
                        @endforeach
                            @error('sizes')
                            <p class="invalid-feedback">{{ $message }}</p>
                            @enderror
                    </div>
                </div>
                <div  class="col-md-3 mb-3">
                    <label for="">{{ trans('admin.Orginal Price') }} (OMR) </label>
                    <input style="font-family:Times New Roman; font-size:24px" type="number"  name="orginal_price" class="form-control @error('orginal_price') is-invalid @enderror" value="{{$product->orginal_price}}">
                    @error('orginal_price')
                    <p class="invalid-feedback">{{ $message }}</p>
                    @enderror
                </div>
                {{-- <div style="padding-top: 50px;width:70px"  class=" col-md-1 mb-3  ff">
                 OMR
                </div> --}}

                <div class="col-md-3 mb-3">
                    <label for="">{{ trans('admin.Selling Price') }}   (%)</label>
                    <input style=" font-family:Times New Roman;font-size:24px" placeholder="0" type="number" class="form-control @error('Selling_price') is-invalid @enderror" name="Selling_price"  value="{{$product->Selling_price}}">
                    @error('Selling_price')
                    <p class="invalid-feedback">{{ $message }}</p>
                    @enderror
                </div>
                {{-- <div style="padding-top: 50px;width:70px"  class=" col-md-1 mb-3  ff">
                  %
                </div> --}}

                <div  class="col-md-3 mb-3">
                    <label for="">{{ trans('admin.Quantity') }}</label>
                    <input style="font-family:Times New Roman; font-size:24px" type="number"  name="quantity" class="form-control @error('quantity') is-invalid @enderror" value="{{$product->quantity}}">
                    @error('quantity')
                    <p class="invalid-feedback">{{ $message }}</p>
                    @enderror
                </div>

                <div class="col-md-3 mb-3">
                    <label for="">{{ trans('admin.Tax') }}  (%)  </label>
                    <input style=" font-family:Times New Roman;font-size:24px; display:inline;" placeholder="5" type="number" class="form-control @error('tax') is-invalid @enderror" name="tax" value="{{$product->tax}}">
                    @error('tax')
                    <p class="invalid-feedback">{{ $message }}</p>
                    @enderror

                </div>
                {{-- <div style="padding-top: 50px;width:70px" class=" col-md-1 mb-3  ff">
                  %
                </div> --}}



                {{-- <div class=" col-md-12 mb-3 ">
                  <label for="view" class="col-sm-2 col-form-label">Views</label>
                  <div class="">
                    <input  style="font-size: 20px; font-family:'Times New Roman', Times, serif"  type="number" name="views" class="form-control" id="view">
                  </div>
                </div> --}}

                <div  class="form-group mb-3">
                    <label for="">{{ trans('admin.Image') }}</label>
                    <input style="color:#0090E7; font-size:24px" type="file"  name="image" class="form-control  @error('image') is-invalid @enderror" accept="image/*">
                    @error('image')
                    <p class="invalid-feedback">{{ $message }}</p>
                    @enderror
                </div>
                <div  class="form-group mb-3">
                    <label for="">{{ trans('admin.Gallery') }}</label>
                    <input style="color:#0090E7; font-size:24px" type="file"  name="images[]" multiple class="form-control  @error('images') is-invalid @enderror" accept="image/*">
                    @error('images')
                    <p class="invalid-feedback">{{ $message }}</p>
                    @enderror
                </div>
                {{--
                            <div class="form-group mb-3">
                                <label for="">{{ trans('admin.Gallery') }}</label>
                                <input type="file" style="color:#0090E7; font-size:24px" name="images[]" id="images" class="form-control" multiple="multiple">
                            </div>
                   --}}

                <div  class="form-group mb-3">
                    <label for="">{{ trans('admin.choose Video') }}</label>
                    <input style="color:#0090E7; font-size:24px" type="file"  name="video" class="form-control  @error('video') is-invalid @enderror" accept="video/*">
                    @error('video')
                    <p class="invalid-feedback">{{ $message }}</p>
                    @enderror
                </div>
                <div class="col-md-12 mb-4">
                    <label >{{ trans('admin.Status') }} </label>
                    <select style=" color:rgb(151, 35, 35);font-size:24px" class="form-control  @error('status') is-invalid @enderror"   name="status">
                        <option style="color:rgb(151, 35, 35);" value="" >{{ trans('admin.select the status') }}</option>
                        <option style="color: black" value="0" {{$product->status == 0?'selected':''}}>{{ trans('admin.Inactive') }}</option>
                        <option style="color: black" value="1" {{$product->status == 1?'selected':''}}>{{ trans('admin.Active') }}</option>
                    </select>
                    @error('status')
                    <p class="invalid-feedback">{{ $message }}</p>
                    @enderror
                </div>

                <div class="col mb-3">
                    @error('trending')
                    <p class="invalid-feedback">{{ $message }}</p>
                    @enderror
                    <input type="checkbox"  name="trending" class=" @error('trending') is-invalid @enderror"  {{$product->trending == 1 ?'checked':''}}>
                    <label for="">{{ trans('admin.Popular') }}</label>
                </div>
                <div class="form-group mb-5">
                    <button type="submit" class="btn btn-primary  btn-lg"> {{ trans('admin.add product') }} </button>
                </div>

            </div>
        </form>

@endsection
