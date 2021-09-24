
@extends('admin.layouts.app')
@section('content')
<div class="card">
    <div style="background-color:lavender" class="card-header">
        
        <h1 style=" color:rgb(151, 35, 35); text-align:center; font-size:50px;margin-top:20px">{{ trans('admin.edit coupon') }} </h1>
    </div>
<div>
    <div  class="card-body">
        <div style="position: relative; top: 20px; right: -20px">
            @include('admin.alerts.success')
            <a style="margin-bottom: 20px;" href="{{ route('homecoupon') }}" class="btn btn-success btn-lg"><span style="text-align: center">{{ trans('admin.main') }}</span></a>

        <form action="{{ url('admin/update-coupon/'.$coupon->id) }}" method="POST"   enctype="multipart/form-data">
            @csrf
            @method('PUT')
           <div class="row">

            
            <div  class="col-md-4  mb-3">
                <label for="">{{ trans('admin.code') }}</label>
                <input style=" font-family:Times New Roman; font-size:20px" value="{{$coupon->code}}" type="text"  name="code" class="form-control">
            </div>

            <div class="col-md-4 mb-3">
                <label >{{ trans('admin.type') }} </label>
                    <select style=" font-family:Times New Roman; font-size:20px" class="form-control" name="type">
                        <option style="color:rgb(151, 35, 35);" value="">{{ trans('admin.select the type') }}</option>
                        <option value="{{ trans('admin.fixed') }}"{{ old('type')=='fixed'? 'slected':null }}>{{ trans('admin.fixed') }}</option>
                        <option value="{{ trans('admin.percentage') }}"{{ old('type')=='percentage'? 'slected':null }}>{{ trans('admin.percentage') }}</option>
                    </select>
                </div>

            <div class="col-md-4 mb-3">
                <label >{{ trans('admin.Status') }} </label>
                    <select  style=" font-family:Times New Roman; font-size:20px" class="form-control" name="status">
                        <option style="color:rgb(151, 35, 35);">{{ trans('admin.select the status') }}</option>
                        <option value="1">{{ trans('admin.Active') }}</option>
                        <option value="0">{{ trans('admin.Inactive') }}</option>
                    </select>
                </div>
                <div  class="col-md-4  mb-3">
                    <label for="">{{ trans('admin.value') }}</label>
                    <input style=" font-family:Times New Roman; font-size:20px" type="number"  value="{{ $coupon->value }}"  name="value" class="form-control">
                </div>
                  
                    <div  class="col-md-4  mb-3">
                        <label for="">{{ trans('admin.start Date') }}</label>
                        <input style=" font-family:Times New Roman; font-size:20px" type="date" value="{{ $coupon->start_date }}"  name="start_date" class="form-control">
                    </div>
                    <div  class="col-md-4  mb-3">
                        <label for="">{{ trans('admin.Expiry Date') }}</label>
                        <input style=" font-family:Times New Roman; font-size:20px" type="date"  value="{{$coupon->expire_date}}" name="expire_date" class="form-control">
                    </div>
                   
                    <div class="col mb-5">
                        <button type="submit" class="btn btn-primary btn-lg"> {{ trans('admin.edit') }} </button>
                    </div>

          
        </form>
     

    
@endsection