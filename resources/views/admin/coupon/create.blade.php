
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
            <a style="margin-bottom: 20px;" href="{{ route('homecoupon') }}" class="btn btn-success btn-lg"><span style="text-align: center">{{ trans('admin.All Coupons') }}</span></a>

        <form action="{{ route('store-coupon') }}" method="POST" enctype="multipart/form-data">
            @csrf
           <div class="row">

            <div class="form-check form-group  mb-3">
               <div
                <label for="">{{ trans('admin.coupon option') }}</label>
               </div >
                <input class="form-check-input" type="radio" name="coupon_option" value="Automatic">
                <label class="form-check-label" >
               Automatic  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                </label>
             
           
                <input class="form-check-input" type="radio" name="coupon_option" value="Manual">
                <label class="form-check-label" ">
                Manual
                </label>
              </div>

            <div  class="col-md-12  mb-3">
                <label for="">SubTitle</label>
                <input style=" font-family:Times New Roman; font-size:24px" type="text"  name="subtitle" class="form-control">
            </div>

            <div class="col-md-4 mb-5">
                <label >Status </label>
                    <select class="form-control">
                        <option value="1">{{ trans('admin.Active') }}</option>
                        <option value="0">{{ trans('admin.Inactive') }}</option>
                    </select>
                </div>
            </div>

            <div style="position: relative;bottom: 20px; right: -400px" class="form-group mb-3">
                <button type="submit" class="btn btn-primary btn-lg"> {{ trans('admin.add coupon') }} </button>
            </div>
          
           </div>
        </form>
     

    
@endsection