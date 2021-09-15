
@extends('admin.layouts.app')
@section('content')
<div class="card">
    <div style="background-color:lavender" class="card-header">
        
        <h1 style=" color:rgb(151, 35, 35); text-align:center; font-size:50px;margin-top:20px">{{ trans('admin.All Coupons') }} </h1>
    </div>
<div>
    <div  class="card-body">
        <div style="position: relative; top: 20px; right: -20px">
            @include('admin.alerts.success')
            <a style="margin-bottom: 20px;" href="{{ route('homeslider') }}" class="btn btn-success btn-lg"><span style="text-align: center">All Sliders</span></a>

        <form action="{{ route('store-slider') }}" method="POST" enctype="multipart/form-data">
            @csrf
           <div class="row">

            <div  class="col-md-12  mb-3">
                <label for="">Title</label>
                <input style="font-family:Times New Roman; font-size:24px" type="text"  name="title" class="form-control">
            </div>
            <div  class="col-md-12  mb-3">
                <label for="">SubTitle</label>
                <input style=" font-family:Times New Roman; font-size:24px" type="text"  name="subtitle" class="form-control">
            </div>
{{-- 
            <div  class="col-md-12 mb-3">
                <label for="">Link</label>
                <input style="font-family:Times New Roman; font-size:24px" type="text"  name="link" class="form-control">
            </div>
            <div  class="col-md-12 mb-3">
                <label for="">Price</label>
                <input style="font-family:Times New Roman; font-size:24px" type="number"  name="price" class="form-control">
            </div> --}}

            <div  class="form-group mb-3">
                <label for="">top Slider</label> 
                <input style="color:#0090E7; font-size:24px" type="file"  name="image" class="form-control">
            </div>
            
            <div  class="form-group mb-3">
                <label for=""> Bottom Slider</label> 
                <input style="color:#0090E7; font-size:24px" type="file"  name="imageSlider" class="form-control">
            </div>
            <div class="col-md-4 mb-5">
                <label >Status </label>
                    <select class="form-control">
                        <option value="0">Inactive</option>
                        <option value="1">Active</option>
                    </select>
                </div>
            </div>

            <div style="position: relative;bottom: 20px; right: -400px" class="form-group mb-3">
                <button type="submit" class="btn btn-primary btn-lg"> Add Slider </button>
            </div>
          
           </div>
        </form>
     

    
@endsection