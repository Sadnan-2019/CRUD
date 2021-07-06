<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\Payment;
use App\Models\Shipping;
use Illuminate\Http\Request;
use DB;
use PDF;

class OrderController extends Controller
{
    public function MangeOrder(){
        $orders=DB::table('orders')
            ->join('customers','customers.id','=','orders.customer_id')
            ->join('payments','orders.id','=','payments.order_id')
            ->select('orders.*','customers.first_name','customers.last_name','payments.payment_type','payments.payment_status')
            ->get();
        return view('admin.order.manage-order',['orders'=>$orders]);


    }



    public function ViewOrderDetails($id){
   $order=Order::find($id);
   $customer =Customer::find($order->customer_id);
   $shipping=Shipping::find($order->shipping_id);
   $payment=Payment::where('order_id',$order->id)->first();
   $orderdetails=OrderDetails::where('order_id',$order->id)->get();

        return view('admin.order.order-details',[


            'order'=>$order,
            'customer'=>$customer,
            'shipping'=>$shipping,
            'payment'=>$payment,
            'orderdetails'=>$orderdetails,
        ]);



    }


    public function ViewOrderInvoice($id){

        $orders=Order::find($id);
        $customer =Customer::find($orders->customer_id);
        $shipping=Shipping::find($orders->shipping_id);
        $payment=Payment::where('order_id',$orders->id)->first();
        $orderdetails=OrderDetails::where('order_id',$orders->id)->get();

        /*$payment=Payment::where('order_id',$orders->id)->first();
        $orderdetails=OrderDetails::where('order_id',$orders->id)->get();*/


        return view('admin.order.view-invoice',[
            'orders'=>$orders,
            'customer'=>$customer,
            'shipping'=>$shipping,
            'payment'=>$payment,
            'orderdetails'=>$orderdetails/*,

            'payment'=>$payment,
            'orderdetails'=>$orderdetails,*/
        ]);
    }


    public function DownloadOrderInvoice($id){
         $orders=Order::find($id);
         $customers=Customer::select('first_name','last-name');

        $pdf=PDF::loadview('admin.order.download-invoice',[
            'orders'=>$orders,
            'customers'=>$customers






        ]);
        return $pdf->stream('invoice.pdf');








    }
}
