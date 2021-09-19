
@extends('admin.layouts.app')
@section('content')
<div class="card">
    <div style="background-color:lavender" class="card-header">
        
        <h1 style=" color:rgb(151, 35, 35); text-align:center; font-size:50px;margin-top:20px">{{ trans('admin.add slider') }} </h1>
    </div>
<div>
    <div  class="card-body">
        <div style="position: relative; top: 20px; right: -20px">
            @include('admin.alerts.success')
            <a style="margin-bottom: 20px;" href="{{ route('homeslider') }}" class="btn btn-success btn-lg"><span style="text-align: center">{{ trans('admin.SliderHome') }}</span></a>

        <form action="{{ route('store-slider') }}" method="POST" enctype="multipart/form-data">
            @csrf
           <div class="row">


            <div class="col-md-12 mb-3">
                <label style="color: #0090E7">   {{ trans('admin.choose the slider') }} </label>
                    <select class="form-control" name="type">
                      
                        <option >top</option>
                        <option >bottom</option>
                    </select>
                </div>
            


            <div  class="col-md-12  mb-3">
                <label for="">{{ trans('admin.title') }}</label>
                <input  placeholder="{{ trans('admin.without') }}"   style="font-family:Times New Roman; font-size:24px" type="text"  name="title" class="form-control">
            </div>
            <div  class="col-md-12  mb-3">
                <label for="">{{ trans('admin.subtitle') }}</label>
                <input placeholder="{{ trans('admin.without') }}" style=" font-family:Times New Roman; font-size:24px" type="text"  name="subtitle" class="form-control">
            </div>

            <div  class="col-md-12 mb-3">
                <label for="">{{ trans('admin.Link') }}</label>
                <input placeholder="{{ trans('admin.without') }}" style="font-family:Times New Roman; font-size:24px" type="text"  name="link" class="form-control">
            </div>
            {{-- <div  class="col-md-12 mb-3">
                <label for="">Price</label>
                <input style="font-family:Times New Roman; font-size:24px" type="number"  name="price" class="form-control">
            </div> --}}
            <div class="col-md-4 mb-3">
                <label >{{ trans('admin.Status') }} </label>
                    <select class="form-control" name="status">
                        <option value="0">{{ trans('admin.Inactive') }}</option>
                        <option value="1">{{ trans('admin.Active') }}</option>
                    </select>
                </div>
            </div>
            
            <div  class="form-group mb-3">
                <label for="">{{trans('admin.imageSlider')}}</label> 
                <input style="color:#0090E7; font-size:24px" type="file"  name="imageSlider" class="form-control">
            </div>
            
         <div class="form-group mb-3">

                <button type="submit" class="btn btn-primary btn-lg"> {{ trans('admin.add slider') }} </button>
            </div>
          
           
        </form>
     

    
@endsection