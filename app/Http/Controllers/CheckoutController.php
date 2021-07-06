<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\Payment;
use App\Models\Shipping;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use Cart;
use Session;
use  Mail;

class CheckoutController extends Controller
{
    public function index(){
        $categorieshome =Category::where('publicationstatus',1)
            ->take(3)
            ->get();
return view('front-end.checkout.checkout-content',[
    'categorieshome'=>$categorieshome


]);



    }


    public function CustomerSignup(Request $request){


        $customer=new Customer();
        $customer->first_name=$request->first_name;
        $customer->last_name=$request->last_name;
        $customer->email=$request->email;
        $customer->phone=$request->phone;
        $customer->password=Hash::make($request->password);
        $customer->address=$request->address;
        $customer->save();


         $customerId = $customer->id;
         Session::put('customerId',$customerId);
         Session::put('customerName',$customer->first_name.''.$customer->last_name);
         /*$data=$customer->toArray();*/




        $email=$customer['email'];
        $meassagedata=['email'=>$customer['email'],'first_name'=>$customer['first_name'],'last_name'=>$customer['last_name'],'code'=>base64_encode($customer['email'])];
       /* return $data;
         exit();*/
         Mail::send('front-end.mails.confirmation-mail',$meassagedata,function ($meassage) use ($email){

            $meassage->to($email);

            $meassage->subject('FROM EISER BY MD SADNAN HOSSIAN');



         });
         return redirect('/checkout/shipping');

    }


    public function CustomerLogin(Request $request){

     $customer=Customer::where('email',$request->email)->first();

     if (password_verify($request->password,$customer->password)){

        Session::put('customerId',$customer->id);
        Session::put('customerName',$customer->first_name.''.$customer->last_name);
        return redirect('/checkout/shipping');

     }

     else{


        return redirect('/checkout')->with( 'meassage','Invalid Password');
     }


     /*return $customer;*/





    }

    public function CustomerLogout(){


        Session::forget('customerId');
        Session::forget('customerName');
        return redirect('/');
    }






















    public function confirmAccount(){


        $categorieshome =Category::where('publicationstatus',1)
            ->take(3)
            ->get();

        return view('front-end.mails.verification',[

            'categorieshome'=>$categorieshome,



        ]);



    }






    public function shippingForm(){

        $categorieshome =Category::where('publicationstatus',1)
            ->take(3)
            ->get();
        $customerinfo =  Customer::find(Session::get('customerId'));


        return view('front-end.checkout.shipping',[

            'categorieshome'=>$categorieshome,
            'customerinfo'=>$customerinfo






        ]);


    }



    public function SaveshippingInfo(Request $request){

        $shipping=new Shipping();
        $shipping->firstname=$request->firstname;
        $shipping->lastname=$request->lastname;
        $shipping->email=$request->email;
        $shipping->phone=$request->phone;
        $shipping->address=$request->address;
        $shipping->save();


        Session::put('ShippingID',$shipping->id);
        return redirect('checkout/payment');








    }


    public function PaymentForm(){
$categorieshome = Category::where('publicationstatus',1)
    ->take(3)
    ->get();

return view("front-end.checkout.payment",[

    'categorieshome'=>$categorieshome
]);




    }



    public function Neworder(Request $request){


        $paymentType  = $request->payment_type;
        if($paymentType == 'Cash'){
            $order=new Order();
            $order->customer_id = Session::get('customerId');
            $order->shipping_id = Session::get('ShippingID');
            $order->order_total  =  Session::get('OrderTotal');
            $order->save();

            $payment=new Payment();
            $payment->order_id=$order->id;
            $payment->payment_type=$paymentType;
            $payment->save();


            $CartProducts=Cart::content();
            foreach ($CartProducts as $cartProduct){

                $OrderDetails = new OrderDetails();
                $OrderDetails->order_id= $order->id;
                $OrderDetails->product_id= $cartProduct->id;
                $OrderDetails->product_name= $cartProduct->name;
                $OrderDetails->product_price= $cartProduct->price;
                $OrderDetails->product_quantity = $cartProduct->qty;
                $OrderDetails->save();



            }

            Cart::destroy();
            return redirect('/complete/order');



        }



    }


public  function Completeorder(){



        $categorieshome =Category::where('publicationstatus',1)
            ->take(3)
            ->get();

        return view('front-end.checkout.complete-order',[


            'categorieshome'=>$categorieshome
        ]);




}










}
