@extends('admin.layouts.app')
@section('content')
<div class="card">
    <div class="card-header">
        <h1 style=" color:rgb(151, 35, 35); text-align:center; font-size:50px;margin-top:20px"> {{trans('admin.Products')}} </h1>
    </div>
    <div class="card-body">
      <a style="margin-bottom:25px;" href="{{url('admin/add-product') }}" class="btn btn-success "><i class="feather icon-plus"></i>{{trans('admin.add product')}}</a>

    {{-- <div style="margin-bottom: 20px; margin-top:20px"> --}}
      <form  action="{{ route('search') }}"  method="get">
        <input style=" margin-top:30;margin-bottom:25px;" type="text" name="search" placeholder="ابحث بالاسم" style="color:blue;">
        <button type="submit" class="btn btn-secondary" style="color: white;">{{ trans('admin.search') }}</button>
      </form>
      <table  class="table table-bordered border-primary">
        
          <thead class="table-light">
              <tr style="text-align: center">
                  <th >#</th>
                  <th >{{trans('admin.code')}} </th>
                  <th >{{trans('admin.category_ar')}} </th>
                  <th > {{ trans('admin.category_en') }}</th>
                  <th >{{ trans('admin.name_ar') }}</th>
                  <th >{{ trans('admin.name_en') }}</th>
                  {{-- <th >{{ trans('admin.Gallery') }}</th> --}}
                  {{-- <th >{{ trans('admin.banner Image') }}</th> --}}
                  <th >{{ trans('admin.Image') }}</th>
                  <th > {{ trans('admin.Status') }}</th>
                  <th >{{ trans('admin.Action') }}</th>
              </tr>
              <tbody>
                @foreach ($products as $product )
                    
                  <tr style="text-align: center">
                      <td>{{$product->id }}</td>
                      <td>{{$product->code}}</td>
                      <td>{{$product->category->name_ar}}</td>
                      <td>{{ $product->category->name_en}}</td>
                      <td>{{$product->name_ar	}}</td>
                      <td>{{ $product->name_en}}</td>
                    <td >
                        <img style="height:70px;width:70px" src="{{ asset('assets/uploads/product/'.$product->image) }}" alt="arabic Image">  
                    </td>
                   
                    <td>
                      <?php if($product->status ==1){?>

                      <a href="{{ url('admin/edit-product/'.$product->id) }}" style="color:green;text-decoration:none"> {{ trans('admin.Active') }}</a>
                      
                      <?php }else {?>
                        <a href="{{ url('admin/edit-product/'.$product->id) }}" style="color: gray; text-decoration:none"> {{ trans('admin.Inactive') }}</a>
                      
                      <?php }?>
                      <div>
                      @if($product->trending ==1)
                    
                        <input   class="form-check-input" type="checkbox" checked>  <label style="color:green">{{ trans('admin.Popular') }} </label>
                      </a>
                      @else
                     <input type="checkbox" >  <label style="color: gray">{{ trans('admin.UnPopular') }} </label></a>
                      @endif
                      </div>
                     
                    </td>
                    {{-- <td>
                      <img style="height: 70px;width:70px" src="{{ asset('assets/uploads/banner/'.$product->banner) }}" style="width: 60px" alt="English Image">  
                  </td> --}}
                     
                      {{-- <td>{{$product->orginal_price }}</td>
                      <td>{{$product->Selling_price}}</td>
                    --}}
                      {{-- <td>
                        <video width="70" height="70" controls>
                            <source src="{{ asset('assets/uploads/videos/'.$product->video) }}" type="video">
                          </video>
                      </td> --}}
                      <td class="table-action">
                        {{-- <a href="#!" class="btn btn-icon btn-outline-primary"><i class="feather icon-eye"></i></a> --}}
                        <a href="{{ url('admin/edit-product/'.$product->id) }}"class="btn btn-icon btn-outline-primary btn-sm"><i class="feather icon-edit"></i></a>
                        <a href="#" class="btn btn-icon btn-outline-danger btn-sm" data-toggle="modal" data-target="#ModalDelete{{ $product->id }}"><i class="feather icon-trash-2"></i> </a>

                        {{-- <a href="{{ url('admin/delete-product/'.$product->id) }}" class="btn btn-icon btn-outline-danger btn-sm"><i class="feather icon-trash-2"></i></a> --}}
                    </td>
                    @include('modal.delete_product')
                      {{-- <td>
                        <a href="{{ url('admin/edit-product/'.$product->id) }}"  class="btn btn-primary btn-sm">Edit</button></a>
                         
                        <a href="{{ url('admin/delete-product/'.$product->id) }}" class="btn btn-danger btn-sm">Delete</button></a>
                      </td> --}}
                  </tr>
                  @endforeach
              </tbody>
          </thead>
      </table>
      {{ $products->links() }}
     </div>

<div>
    
@endsection