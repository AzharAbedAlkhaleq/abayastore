@extends('admin.layouts.app')
@section('content')
<div class="">
  <h1 style=" color:rgb(151, 35, 35); text-align:center; font-size:50px;margin-top:20px"> {{trans('admin.Products')}} </h1>
        <div style="margin-bottom: 20px; margin-top:20px">
        <form  action="{{ route('search') }}"  method="get">
          <input type="text" name="search" placeholder="ابحث بالاسم" style="color:blue;">
          <button type="submit" class="btn btn-secondary" style="color: white;">{{ trans('admin.search') }}</button>
        </form>
        </div>
      <table  class="table table-bordered border-primary">

        <a style="margin-bottom:25px;" href="{{url('admin/add-product') }}" class="btn btn-success "><i class="feather icon-plus"></i>{{trans('admin.add product')}}</a>


          <thead class="table-stripped">
              <tr style="text-align: center">
                  {{-- <th >#</th> --}}
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
                  <td>{{$product->code}}</td>
                  <td>{{$product->category->name_ar}}</td>
                  <td>{{ $product->category->name_en}}</td>
                  <td>{{$product->name_ar	}}</td>
                  <td>{{ $product->name_en}}</td>
                <td >
                    <img style="height:70px;width:70px" src="{{ asset('assets/uploads/product/'.$product->image_ar) }}" alt="arabic Image">
                </td>
                <td >
                  <?php if($product->status ==1){?>
                  <a href="{{ url('admin/edit-product/'.$product->id) }}" style="color:green;text-decoration:none"> {{ trans('admin.Active') }}</a>
                  <?php }else {?>
                    <a href="{{ url('admin/edit-product/'.$product->id) }}" style="color: gray; text-decoration:none"> {{ trans('admin.Inactive') }}</a>
                  <?php }?>
                  
                  <div >
                      @if($product->trending ==1)
                        <input  class="form-check-input" type="checkbox" checked>  <label style="color:green">{{ trans('admin.Popular') }} </label>
                        </a>
                      @else
                      <input type="checkbox" >  <label style="color: gray">{{ trans('admin.UnPopular') }} </label></a>
                     @endif
                  </div>

                </td>
                <td class="table-action">

                        {{-- <td style="color: red">{{ $category->status==1 ? 'Active':'Inactive' }}</td> --}}

                     {{-- <td style="text-align: center; margin-top:20px"> --}}
                      <a href="{{ url('admin/edit-product/'.$product->id) }}"class="btn btn-icon btn-outline-primary btn-sm"><i class="feather icon-edit"></i></a>
                      <a href="#" class="btn btn-icon btn-outline-danger btn-sm" data-toggle="modal" data-target="#ModalDelete{{ $product->id }}"><i class="feather icon-trash-2"></i> </a>

                    </td>
                    @include('modal.delete_product')

                  </tr>
                    @endforeach

              </tbody>
          </thead>
      </table>
      {{ $products->links() }}
     </div>

<div>

@endsection
