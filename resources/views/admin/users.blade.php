@extends('admin.layouts.app')
@section('content')



<div class="">
    <h1 style=" color:rgb(151, 35, 35); text-align:center; font-size:50px;margin-top:20px"> {{trans('admin.Users')}} </h1>
    
        <table  class="table table-bordered border-primary">
  
  
  
            <thead class="table-stripped">
                <tr style="text-align: center">
                   <th >{{ trans('admin.Id') }}</th>
                    <th >{{trans('admin.Name')}} </th>
                    <th >{{trans('admin.Phone')}} </th>
                    <th > {{ trans('admin.Email') }}</th> 
                    <th >{{ trans('admin.Action') }}</th>
                </tr>
            </thead>
        </table>

        {{-- {{ $datas->links() }} --}}
    </div>
@endsection