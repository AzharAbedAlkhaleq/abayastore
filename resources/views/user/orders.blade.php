@include('user.includes.head')
@include('user.includes.header')

<div class="container-fluid">
    <h2 class="text-center mt-2">الطلبات</h2>
    <table class="table table-striped">
        <thead>
            <tr style="text-align: center">
                
                <th>transaction id</th>
                <th >payment method</th>
                <th >payment status</th>
                <th >coupon</th>
                <th >subtotal</th>
                <th >total discount</th>
                <th >delivery</th>
                <th >grandtotal</th>
                <th >status</th>
                <th >Tracking id</th>
                <th >created at</th>
                <th >action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order )
            <tr style="text-align: left">
            <td>{{$order->transaction_id}}</td>
            <td>{{$order->payment_method}}</td>
            <td>{{$order->payment_status}}</td>
            <td>{{$order->coupon->code??''}}</td>
            <td>{{$order->subtotal}}</td>
            <td>{{$order->total_discount}}</td>
            <td>{{$order->delivery}}</td>
            <td>{{ $order->grandtotal}}</td>
            <td>
               {{$order->status}}
           </td>
           <td>{{$order->tracking_id}}</td>
            <td>{{$order->created_at}}</td>
           
          <td class="table-action">
            
            </td>
        @endforeach
        </tbody>
      </table>
      <div class="paginate d-flex justify-content-center">{{$orders->links()}}</div>
</div>

@include('user.includes.footer')    