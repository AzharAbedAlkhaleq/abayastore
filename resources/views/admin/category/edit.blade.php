@extends('admin.layouts.app')
@section('content')
{{--@if ($errors->any())--}}
{{--    <div class="alert alert-danger">--}}
{{--        <ul>--}}
{{--            @foreach ($errors->all() as $error)--}}
{{--                <li>{{ $error }}</li>--}}
{{--            @endforeach--}}
{{--        </ul>--}}
{{--    </div>--}}
{{--@endif--}}
<div class="card">
    <div style="background-color:lavender" class="card-header">
        <h1 style=" color:rgb(151, 35, 35); text-align:center; font-size:50px; margin-top:20px">{{ trans('admin.edit category') }} </h1>

    </div>
<div>
  <div  class="card-body">
    <div style="position: relative; top: 20px; right: -20px">
        {{-- @include('admin.alerts.success') --}}
        <a style="margin-bottom: 40px;" href="{{ route('categories') }}" class="btn btn-primary btn-lg"><span style="text-align: center">{{ trans('admin.main') }}</span></a>

        <form action="{{ route('update-category') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
           <div class="row">
        <input type="hidden" name="id" value="{{ $category->id}}">
            <div  class="col-md-6 mb-3">
                <label for="">{{ trans('admin.Arabic_Name') }}</label>
                <input style=" font-family:Times New Roman;font-size:24px" type="text" value="{{ $category->name_ar}}"  name="name_ar" class="form-control @error('name_ar') is-invalid @enderror"  >
                @error('name_ar')
                <p class="invalid-feedback">{{ $message }}</p>
                @enderror
              </div>
            {{-- <div  class="col-md-6  mb-3">
                <label for="">{{ trans('admin.Arabic Slug') }}</label>
                <input style=" font-family:Times New Roman; font-size:24px" type="text" value="{{ $category->slug_ar}}" name="slug_ar" class="form-control">
            </div> --}}

            <div  class="col-md-6 mb-3">
                <label for=""> {{ trans('admin.English_Name') }}</label>
                <input style=" font-size:24px" type="text" value="{{ $category->name_en}}"  name="name_en" class="form-control @error('name_en') is-invalid @enderror"  >
                @error('name_en')
                <p class="invalid-feedback">{{ $message }}</p>
                @enderror
              </div>

            {{-- <div class="col-md-6  mb-3">
                <label for="">{{ trans('admin.english slug') }}</label>
                <input style=" font-family:Times New Roman;font-size:24px" type="text" value="{{ $category->slug_en}}"  class="form-control" name="slug_en">
            </div> --}}
            {{-- <div class=class="col-md-12 mb-3">
                <label for=""> {{ trans('admin.Small Arabic Description') }}</label>
                <div class="mb-3">
                  <textarea  style="font-size: 20px; font-family:'Times New Roman', Times, serif" type="text" value="{{ $category->small_desc_ar}}" name="small_desc_ar" class="form-control" id="descrpt">
                  </textarea>
                </div>
              </div>
              <div class=class="col-md-12 mb-3">
                <label for="descrpt"">{{ trans('admin.Arabic Description') }}</label>
                <div class="mb-3">
                  <textarea  style="font-size: 20px; font-family:'Times New Roman', Times, serif" type="text"  value="{{ $category->description_ar}}" name="description_ar" class="form-control" id="descrpt">
                  </textarea>
                </div>
              </div> --}}
            {{-- <div class=class="col-md-12 mb-3">
                <label for=""> {{ trans('admin.Small English Description') }}</label>
                <div class="mb-3">
                  <textarea  style="font-size: 20px; font-family:'Times New Roman', Times, serif" value="{{$category->small_desc_en}}" type="text" name="small_desc_en" class="form-control" id="descrpt">
                  </textarea>
                </div>
              </div>
              <div class=class="col-md-12 mb-3">
                <label for="descrpt"">{{ trans('admin.English Description') }}</label>
                <div class="mb-3">
                  <textarea  style="font-size: 20px; font-family:'Times New Roman', Times, serif" value="{{$category->description_en}}" type="text" name="description_en" class="form-control" id="descrpt">
                  </textarea>
                </div>
              </div> --}}
             <div class="col-md-12 mb-4">
              <label >{{ trans('admin.Status') }} </label>
                  <select style="color:rgb(151, 35, 35); font-size:24px"   class="form-control @error('status') is-invalid @enderror"   name="status"  >
                      <option style="color:rgb(216, 128, 128);" value="">{{ trans('admin.select the status') }}</option>
                      <option style="color: black" value="0" {{ $category->status == 0 ?'selected':''}}>{{ trans('admin.Inactive') }}</option>
                      <option style="color: black" value="1" {{$category->status == 1?'selected':'' }}>{{ trans('admin.Active') }}</option>

                    </select>
                 @error('status')
                 <p class="invalid-feedback">{{ $message }}</p>
                 @enderror
              </div>
          </div>

           @if($category->image)
           <img style="width: 75px;height:75px" src="{{ asset('assets/uploads/Category_ar/'.$category->image) }}" alt="image">
           @endif

            <div  class="form-group  mb-3">
                <label for="">{{ trans('admin.Image') }}</label>
                <input  style="color:#0090E7; font-size:24px" type="file"  name="image" class="form-control" >

              </div>

            {{-- @if($category->image_en)
            <img style="width: 75px;height:75px" src="{{ asset('assets/uploads/Category_en/'.$category->image_en) }}" alt="image">

            @endif
            <div class="form-group mb-3">
                <label for="">{{ trans('admin.English_Image') }}</label>
                <input type="file" style="color:#0090E7; font-size:20px" name="image_en" class="form-control">
            </div> --}}


            {{-- <div class="col-md-6 mb-3">
                <input type="checkbox" {{ $category->status =="1" ? 'checked':''}} name="status">
                <label for="">{{ trans('admin.normal') }}</label>

            </div>

            <div class="col-md-6 mb-3">

                <input type="checkbox" {{ $category->popular =="1" ? 'checked':''}} name="popular">
                <label for="">{{ trans('admin.Popular') }}</label>
            </div> --}}

            <div class="form-group mb-5">
                <button type="submit" class="btn btn-primary btn-lg"> {{ trans('admin.edit category') }}</button>
            </div>

           </div>
        </form>



@endsection
