
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
                   <input style=" font-family:Times New Roman; font-size:20px" type="text"  name="code" class="form-control @error('code') is-invalid @enderror" value="{{$coupon->code}}">
                   @error('code')
                   <p class="invalid-feedback">{{ $message }}</p>
                   @enderror
               </div>

               <div class="col-md-4 mb-3">
                   <label >{{ trans('admin.type') }} </label>
                   <select style=" font-family:Times New Roman; font-size:20px" class="form-control @error('type') is-invalid @enderror" name="type">
                       <option style="color:rgb(151, 35, 35);" value="">{{ trans('admin.select the type') }}</option>
                       <option value="fixed" {{ old('type')=='fixed'? 'selected':null }} {{$coupon->type =='fixed'?'selected':''}}>{{ trans('admin.fixed') }}</option>
                       <option value="percentage"{{ old('type')=='percentage'? 'slected':null }} {{$coupon->type =='percentage'?'selected':''}}>{{ trans('admin.percentage') }}</option>
                   </select>
                   @error('type')
                   <p class="invalid-feedback">{{ $message }}</p>
                   @enderror
               </div>

               <div class="col-md-4 mb-3">
                   <label >{{ trans('admin.Status') }} </label>
                   <select  style=" font-family:Times New Roman; font-size:20px" class="form-control @error('status') is-invalid @enderror" name="status">
                       <option style="color:rgb(151, 35, 35);" value="">{{ trans('admin.select the status') }}</option>
                       <option value="1" {{$coupon->status =='1'?'selected':''}}>{{ trans('admin.Active') }}</option>
                       <option value="0"  {{$coupon->status =='0'?'selected':''}}>{{ trans('admin.Inactive') }}</option>
                   </select>
                   @error('status')
                   <p class="invalid-feedback">{{ $message }}</p>
                   @enderror
               </div>
               <div  class="col-md-4  mb-3">
                   <label for="">{{ trans('admin.value') }}</label>
                   <input style=" font-family:Times New Roman; font-size:20px" type="text"  name="value" class="form-control @error('value') is-invalid @enderror" value="{{$coupon->value}}">
                   @error('value')
                   <p class="invalid-feedback">{{ $message }}</p>
                   @enderror
               </div>

               <div  class="col-md-4  mb-3">
                   <label for="">{{ trans('admin.start date') }}</label>
                   <input style=" font-family:Times New Roman; font-size:20px" type="date"  name="start_date" class="form-control  @error('start_date') is-invalid @enderror" value="{{$coupon->start_date}}">
                   @error('start_date')
                   <p class="invalid-feedback">{{ $message }}</p>
                   @enderror
               </div>
               <div  class="col-md-4  mb-3">
                   <label for="">{{ trans('admin.Expiry Date') }}</label>
                   <input style=" font-family:Times New Roman; font-size:20px" type="date"  name="expire_date" class="form-control @error('expire_date') is-invalid @enderror" value="{{$coupon->expire_date}}">
                   @error('expire_date')
                   <p class="invalid-feedback">{{ $message }}</p>
                   @enderror
               </div>
               {{-- <label for=""> {{ trans('admin.description') }}</label>
               <div class="mb-3">
                 <textarea  style="font-size: 28px; font-family:'Times New Roman', Times, serif" type="text" name="description" class="form-control" id="descrpt">
                 </textarea>
               </div> --}}


               {{-- <div  class="col-md-4  mb-5">
                   <label for="">{{ trans('admin.use times') }}</label>
                   <input style=" font-family:Times New Roman; font-size:20px" type="number"  name="use_time" class="form-control">
               </div> --}}

               <div class="col mb-5">
                        <button type="submit" class="btn btn-primary btn-lg"> {{ trans('admin.edit') }} </button>
                    </div>


           </div>
        </form>



@endsection
