@extends('admin.layouts.app')
@section('content')
<div class=>

        <h1 style=" color:rgb(131, 71, 71); text-align:center; font-size:35px; margin-top:20px">  {{ trans('admin.Categories') }} </h1>
    
      <table  class="table table-bordered border-primary">
        <div style="position: relative; top: 5px; right: -820px; bottom:20px">

            <a style="margin-bottom:15px" href="{{url('admin/add-category') }}" class="btn btn-success "><i class="feather icon-plus"></i>{{ trans('admin. Add Category') }}</a>
         </div> 
        
          <thead class="table-stripped">
              <tr style="text-align: center">
                  <th >{{ trans('admin.Id') }}</th>
                  <th >{{ trans('admin.Arabic_Name') }}</th>
                  <th >{{ trans('admin.English_Name') }}</th>
                  <th >{{ trans('admin.Arabic_Image') }}</th>
                  <th >{{ trans('admin.English_Image') }}</th>
                  <th >{{ trans('admin.Action') }}</th>
              </tr>
              <tbody>
                  @foreach ($categories as $category )
        
                  <tr style="text-align: center">
                      <td style="text-align: center">{{ $category->id }}</td>
                      <td style="text-align: center">{{ $category->name_ar	}}</td>
                      <td  >{{ $category->name_en }}</td>
                      <td >
                        <img src="{{ asset('assets/uploads/Category_ar/'.$category->image_ar) }}" style="width:50px;height:50px" alt="Arabic Image">  
                    </td>

                      <td >
                        <img src="{{ asset('assets/uploads/Category_en/'.$category->image_en) }}" style="width: 50px;height:50px" alt="English Image">  
                     <td style="text-align: center; margin-top:20px">
                         <a href="{{ url('admin/edit-category/'.$category->id) }}"  class="btn btn-primary">{{ trans('admin.edit') }} </a>
                         
                        
                         <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#ModalDelete{{ $category->id }}">{{ trans('admin.delete') }} </a>
                    </td>
@include('modal.delete')
                  </tr>
                    @endforeach
                 
              </tbody>
          </thead>
      </table>
      {{ $categories->links() }}
     </div>

<div>
    
@endsection