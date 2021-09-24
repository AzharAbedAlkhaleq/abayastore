@extends('admin.layouts.app')
@section('content')
<div class="card">
    <div style="background-color:lavender" class="card-header">
        <h1 style=" color:rgb(151, 35, 35); text-align:center; font-size:35px;margin-top:20px">{{ trans('admin. Add Category') }} </h1>
    </div>
<div>
    <div  class="card-body">
        <div style="position: relative; top: 20px; right: -20px">
            {{-- @include('admin.alerts.success') --}}
            <a style="margin-bottom: 20px;" href="{{ route('categories') }}" class="btn btn-primary btn-lg"><span style="text-align: center">{{ trans('admin.main') }}</span></a>

        <form action="{{ route('store-category') }}" method="POST" enctype="multipart/form-data">
            @csrf
           <div class="row">

            <div  class="col-md-6  mb-3">
                <label for="">{{ trans('admin.Arabic_Name') }}</label>
                <input style="font-family:Times New Roman; font-size:24px" type="text"  name="name_ar" class="form-control  @error('name_ar') is-invalid @enderror">
                @error('name_ar')
                <p class="invalid-feedback">{{ $message }}</p>
                @enderror
              </div>




            {{-- <div  class="col-md-6  mb-3">
                <label for="">{{ trans('admin.Arabic Slug') }}</label>
                <input style=" font-family:Times New Roman; font-size:24px" type="text"  name="slug_ar" class="form-control">
            </div> --}}

            <div  class="col-md-6 mb-3">
                <label for="">{{ trans('admin.English_Name') }}</label>
                <input style="font-family:Times New Roman; font-size:24px" type="text"  name="name_en" class="form-control @error('name_en') is-invalid @enderror"  >
                @error('name_en')
                <p class="invalid-feedback">{{ $message }}</p>
                @enderror
              </div>


            {{-- <div class="col-md-6  mb-3">
                <label for="">{{ trans('admin.english slug') }}</label>
                <input style=" font-family:Times New Roman;font-size:24px" type="text" class="form-control" name="slug_en">
            </div>
            --}}

            {{-- <div class=class="col-md-12 mb-3">
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
             --}}

            <div  class="form-group col-md-6 mb-3">
                <label for="">{{ trans('admin.Image') }}</label>
                <input style="font-size:24px" type="file"  name="image_ar" class="form-control  @error('image_ar') is-invalid @enderror" accept="image/*">
                @error('image_ar')
                <p class="invalid-feedback">{{ $message }}</p>
                @enderror
              </div>

            {{-- <div class="form-group mb-3">
                <label for="">{{ trans('admin.English_Image') }}</label>
                <input type="file" style="color:#0090E7; font-size:24px" name="image_en" class="form-control">
            </div> --}}
            {{-- <div class="form-group mb-3">
                <input type="checkbox"  name="status">
                <label for="">{{ trans('admin.normal') }}</label>

            </div>

            <div class="form-group mb-3">

                <input type="checkbox"  name="popular">
                <label for="">{{ trans('admin.Popular') }}</label>
            </div> --}}
            <div class="col-md-6 mb-4">
              <label >{{ trans('admin.Status') }} </label>
                  <select style=" color:rgb(151, 35, 35);font-size:24px"   name="status" class="form-control @error('status') is-invalid @enderror" >
                      <option style="color:rgb(151, 35, 35);" value="">{{ trans('admin.select the status') }}</option>
                      <option style="color: black" value="0">{{ trans('admin.Inactive') }}</option>
                      <option style="color: black" value="1">{{ trans('admin.Active') }}</option>

                  </select>
                @error('status')
                <p class="invalid-feedback">{{ $message }}</p>
                @enderror

              </div>
          </div>
          {{-- <div class="form-group mb-3">

            <input type="checkbox"  name="popular">
            <label for="">{{ trans('admin.Popular') }}</label>
        </div> --}}

            <div class="form-group mb-5">
                <button type="submit" class="btn btn-primary btn-lg"> {{ trans('admin. Add Category') }} </button>
            </div>

           </div>
        </form>

@endsection
