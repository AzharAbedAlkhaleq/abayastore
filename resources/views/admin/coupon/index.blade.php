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
                                    <th> {{ trans('admin.value') }}</th>
                                    {{-- <th>{{ trans('admin.description') }}</th> --}}
                                    {{-- <th>{{ trans('admin.use times') }}</th> --}}
                                    <th>{{ trans('admin.start date') }}</th>
                                    <th>{{ trans('admin.Expiry Date') }}</th>
                                    <th >{{ trans('admin.Status') }}</th>
                                    <th>{{ trans('admin.Action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                              @foreach ($coupons as $coupon)
                                <tr>
                                <td>{{ $coupon->id }}</td>
                                <td>{{ $coupon->code}}</td>
                                <td>{{ $coupon->value }} </td>
                                {{-- <td>{{ $coupon->description ?? ''}}</td>   --}}
                                {{-- <td>{{ $coupon->used_time .'/'. $coupon->use_time }}</td>   --}}
                                <td>{{ $coupon->start_date}}</td>
                                <td>{{ $coupon->expire_date}}</td>
                                <td>
                                    <?php if($coupon->status ==1){?>

                                    <a href="{{ url('admin/edit-coupon/'.$coupon->id) }}" style="color:green;text-decoration:none"> {{ trans('admin.Active') }}</a>

                                    <?php }else {?>
                                      <a href="{{ url('admin/edit-coupon/'.$coupon->id) }}" style="color: gray; text-decoration:none"> {{ trans('admin.Inactive') }}</a>

                                    <?php }?>

                                  </td>
                                     <td class="table-action">
                                    {{-- <a href="#!" class="btn btn-icon btn-outline-primary"><i class="feather icon-eye"></i></a> --}}
                                    <a href="{{ url('admin/edit-coupon/'.$coupon->id) }}" class="btn btn-icon btn-outline-primary btn-sm"><i class="feather icon-edit"></i></a>
                                    <a class="btn btn-icon btn-outline-danger btn-sm" data-toggle="modal" data-target="#ModalDelete{{ $coupon->id }}"><i class="feather icon-trash-2"></i> </a>

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

@endsection
