@extends('admin.layouts.app')
@section('content')
<div class="card">
    <div class="card-header">
        <h1 style=" color:rgb(151, 35, 35); text-align:center; font-size:50px;margin-top:20px"> {{ trans('admin.All Coupons') }}  </h1>
    </div>
    <div>
     <div class="card-body">
     <div>
        <a style="margin-bottom:15px;" href="{{route('add-coupon') }}" class="btn btn-success "><i class="feather icon-plus"></i> {{trans('admin.add coupon')}}</a>
   
    </div>
    <table  class="table table-bordered border-primary">
      
        <thead class="table-light">
            <tr style="text-align: center">
                                    <th>{{ trans('admin.Id') }}</th>
                                    <th>{{ trans('admin.code') }}</th>
                                    <th> {{ trans('admin.coupon type') }}</th>
                                    <th>{{ trans('admin.Amount') }}</th>
                                    <th>{{ trans('admin.Amount Type') }}</th>
                                    <th>{{ trans('admin.Expiry Date') }}</th>
                                    <th >{{ trans('admin.Status') }}</th>
                                    <th>{{ trans('admin.Action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                              @foreach ($coupons as $coupon)
                                <tr>
                                <td>{{ $coupon->id }}</td>  
                                <td>{{ $coupon->coupon_code }}</td> 
                                <td>{{ $coupon->coupon_type }}</td>  
                                <td>
                                    {{ $coupon->amount }}
                                    @if(($coupon->amount_type )=='percentange')
                                       % 
                                       @else
                                       OMR
                                    @endif
                                
                                </td>
                                <td>{{ $coupon->amount_type }}</td>
                                <td>{{ $coupon->expiry_date }}</td> 
                                <td>{{ $coupon->status==1 ? 'Active':'Inactive' }}</td>
                                <td class="table-action">
                                    {{-- <a href="#!" class="btn btn-icon btn-outline-primary"><i class="feather icon-eye"></i></a> --}}
                                    <a href="{{ url('admin/edit-coupon/'.$coupon->id) }}" class="btn btn-icon btn-outline-primary btn-sm"><i class="feather icon-edit"></i></a>
                                    <a href="{{ url('admin/delete-coupon/'.$coupon->id) }}" class="btn btn-icon btn-outline-danger"><i class="feather icon-trash-2"></i></a>
                                </td>
                                   @include('modal.delete_coupon')
                                </tr>  
                              @endforeach
                            </tbody>
                        </thead>

                        </table>
                        {{ $coupons->links() }}
                    </div>
                </div>
            </div>
        </div>
    
    </div>
    
    </div>
    

                           
                        
@endsection