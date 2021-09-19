{{-- @extends('admin.layouts.app')
@section('content')

<h1 style=" color:rgb(151, 35, 35); text-align:center; font-size:50px;margin-top:20px"> Add Slider</h1>

<div >

<hr style="color:greenyellow"
            <div class="panel-body">
                <form action="{{ route('store-slider') }}" class="form-horizontal" method="POST" enctype="multipart/form-data">
                 @csrf
                 <div class="form-group">
                     <label class="col-md-4 control-lable"></label>
                     <div class="col-md-4">
                         <input type="text" placeholder="Title" class="form-control input-md">
                     </div>
                 </div>
                 <div class="form-group">
                    <label class="col-md-4 control-lable">Subtitle</label>
                    <div class="col-md-4">
                        <input type="text" placeholder="Subtitle" class="form-control input-md">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-lable">Price</label>
                    <div class="col-md-4">
                        <input type="text" placeholder="Price" class="form-control input-md">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-lable">Link</label>
                    <div class="col-md-4">
                        <input type="text" placeholder="Link" class="form-control input-md">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-lable">Price</label>
                    <div class="col-md-4">
                        <input type="number" placeholder="price" class="form-control input-md">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-lable">Image </label>
                    <div class="col-md-4">
                        <input type="file"  class="input-file">
                    </div>
                </div>
                
                
                    <div class="form-group mb-3">
                        <button  type="submit" class="btn btn-primary btn-le"> Add Slider
                        </button>
                    </div>
                </div>
                </form>

            </div>

        </div>
    </div>
</div>


</div>


    
</div>

@endsection --}}
@extends('admin.layouts.app')
@section('content')
<div class="card">
    <div style="background-color:lavender" class="card-header">
        
        <h1 style=" color:rgb(151, 35, 35); text-align:center; font-size:35px;margin-top:20px">{{ trans('admin.edit slider') }} </h1>
    </div>
<div>
    <div  class="card-body">
        <div style="position: relative; top: 20px; right: -20px">
            @include('admin.alerts.success')
            <a style="margin-bottom: 20px;" href="{{ route('homeslider') }}" class="btn btn-success btn-lg"><span style="text-align: center">{{ trans('admin.SliderHome') }}</span></a>

        <form action="{{ url('admin/update-slider/'.$slider->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
           <div class="row">
            <div class="col-md-12 mb-3">
                <label style="color: #0090E7">   {{ trans('admin.choose the slider') }} </label>
                    <select class="form-control" name="type">
                      
                        <option >{{ trans('admin.top') }}</option>
                        <option >{{ trans('admin.bottom') }}</option>
                    </select>
                </div>
            <div  class="col-md-12  mb-3">
                <label for="">{{ trans('admin.title') }}</label>
                <input  value="{{ $slider->title}}"  style="font-family:Times New Roman; font-size:24px" type="text"  name="title" class="form-control">
            </div>
            <div  class="col-md-12  mb-3">
                <label for="">{{ trans('admin.subtitle') }}</label>
                <input   value="{{ $slider->subtitle}}"style=" font-family:Times New Roman; font-size:24px" type="text"  name="subtitle" class="form-control">
            </div>

            <div  class="col-md-12 mb-3">
                <label for="">{{ trans('admin.Link') }}</label>
                <input  value="{{ $slider->link}}" style="font-family:Times New Roman; font-size:24px" type="text"  name="link" class="form-control">
            </div>
            {{-- <div  class="col-md-12 mb-3">
                <label for="">Price</label>
                <input  value="{{ $slider->price}}" style="font-family:Times New Roman; font-size:24px" type="number"  name="price" class="form-control">
            </div>  --}}



            <div class="col-md-4 mb-3">
                <label >{{ trans('admin.Status') }} </label>
                    <select  class="form-control" name="status">
                        <option value="0">{{ trans('admin.Inactive') }}</option>
                        <option value="1">{{ trans('admin.Active') }}</option>
                    </select>
                </div>
            </div>
           
            @if($slider->imageSlider)
            <img style="width: 75px;height:75px" src="{{ asset('assets/uploads/Slider/'.$slider->imageSlider) }}" alt="image"> 
            @endif
            <div  class="form-group mb-3">
                <label for=""> {{ trans('admin.imageSlider') }}</label> 
                <input style="color:#0090E7; font-size:24px" type="file"  name="imageSlider" class="form-control">
            </div>

        

            <div  class="form-group mb-3">
                <button type="submit" class="btn btn-primary btn-lg"> {{ trans('admin.edit') }} </button>
            </div>
          
           </div>
        </form>
     

    
@endsection