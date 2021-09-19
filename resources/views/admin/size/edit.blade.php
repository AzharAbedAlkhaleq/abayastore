@extends('admin.layouts.app')
@section('content')
<div class="card">
  <div class="card-header">
    <h1 style=" color:rgb(151, 35, 35); text-align:center; font-size:50px ;margin-top:20px"> {{ trans('admin.edit size') }} </h1>
</div>
<div>

    <div class="card-body">
        <div style="position: relative; top: 20px; right: -20px">
          <a style="margin-bottom: 20px;" href="{{ route('sizes') }}" class="btn btn-primary btn-lg"><span style="text-align: center">{{ trans('admin.sizes') }}</span></a>

        <form action="{{url('admin/update-size/'.$size->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
         @method('PUT')

         <div  class=" from-group col-md-6  mb-3">
          <label for="">{{ trans('admin.add size') }}</label>
          <input style="font-family:Times New Roman; " type="text" value="{{ $size->size }}" name="size" class="form-control">
      </div>




    <div class="from-group col-md-6 mb-4">
      <label >{{ trans('admin.Status') }} </label>
          <select style=" color:rgb(151, 35, 35);font-size:24px" class="form-control"   name="status">
              <option style="color:rgb(151, 35, 35);">{{ trans('admin.select the status') }}</option>
              <option style="color: black" value="0">{{ trans('admin.Inactive') }}</option>
              <option style="color: black" value="1">{{ trans('admin.Active') }}</option>
          </select>
      </div>
      
            
            <div class="form-group mb-3">
                <button type="submit" class="btn btn-primary  btn-lg"> {{ trans('admin.edit ') }} </button>
            </div>

           </div>
        </form>
     
@endsection