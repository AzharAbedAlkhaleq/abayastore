<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use App\Models\OrderProduct;
use Illuminate\Http\Request;
use App\Services\Asyad\Asyad;
use App\Http\Controllers\Controller;


class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $orders = Order::where('status','<>','canceled')->latest()->paginate();
    
    //  return($orders);
        return view('admin.order.index',[
            'orders'=>$orders,
        ]);
    }

    public function orderCanceld()
    {
      $orders = Order::where('status','canceled')->latest()->paginate();
    
    //  return($orders);
        return view('admin.order.order-cancel',[
            'orders'=>$orders,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $order = Order::findOrFail($id);
    //  return "$order->customer->phone"." "." $order->customer->lname";
        return view('admin.order.details',[
            'order' => $order,
        ]);
    }

    public function shipping ($id)
    {
     $order = Order::findOrFail($id);
     $asyad = new Asyad;
     $response =   $asyad->pushOrder($order); 
       //return($response);
     $order->tracking_id = $response->data->order_awb_number;
     $order->update();
     return redirect()->back()->with('success',$response->message);
    }


    public function getLabel($tracking_id){
       
     $asyad = new Asyad;
     $response=$asyad->getLabel($tracking_id); 
     //dd($response->data->awb);

     $label = "<div class='alert alert-success text-center mt-4'>".
      " <a class=' btn btn-outline-dark' target='_blank' href={$response->data->awb->labelx4}>طباعة ملصق labelx4</a>
       <br>".
       "<a class='mt-3 btn btn-outline-dark ' target='_blank' href={$response->data->awb->a5}>طباعة ملصق A5</a>"
      ."</div>";
      return redirect()->back()->with('status',$label) ;
    }

    public function cancelOrder($tracking_id){
        $asyad = new Asyad;
       $cancel_response = $asyad->cancelOrder($tracking_id);
        return $cancel_response ;
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Order::destroy($id);
        return redirect()->back()->with('status','تم الحذف!!');
    }
}
