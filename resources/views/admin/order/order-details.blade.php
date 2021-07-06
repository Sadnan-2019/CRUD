@extends('admin.master')

@section('body')
<div class="container">


    <div class="row">

        <div class="col-md-8 offset-3">

<h1 class="text-center">Customer Info</h1>
            <div class="card">

                <table class="table table-bordered">
<tr>

    <th>Customer Name</th>
    <td>{{$customer->first_name.$customer->last_name}}</td>
</tr>
                    <tr>

    <th>Phone No</th>
    <td>{{$customer->phone}}</td>
</tr>
                    <tr>

    <th>Email</th>
    <td>{{$customer->email}}</td>
</tr>
                    <tr>

    <th>Address</th>
    <td>{{$customer->address}}</td>
</tr>


                </table>



            </div>
        </div>
    </div>


    <div class="row">

        <div class="col-md-8 offset-3">

            <h1 class="text-center">Shipping Info</h1>
            <div class="card">

                <table class="table table-bordered">
                    <tr>

                        <th>Customer Name</th>
                        <td>{{$shipping->firstname.$shipping->lastname}}</td>
                    </tr>
                    <tr>

                        <th>Phone No</th>
                        <td>{{$shipping->phone}}</td>
                    </tr>
                    <tr>

                        <th>Email</th>
                        <td>{{$shipping->email}}</td>
                    </tr>
                    <tr>

                        <th>Address</th>
                        <td>{{$shipping->address}}</td>
                    </tr>


                </table>



            </div>
        </div>
    </div>

    <div class="row">

        <div class="col-md-8 offset-3">

            <h1 class="text-center">Payment Info</h1>
            <div class="card">

                <table class="table table-bordered">
                    <tr>

                        <th>Payment Type</th>
                        <td>{{$payment->payment_type}}</td>
                    </tr>
                    <tr>

                        <th>Payment Status  </th>
                        <td>{{$payment->payment_status}}</td>
                    </tr>



                </table>



            </div>
        </div>
    </div>
    <div class="row">

        <div class="col-md-8 offset-3">

            <h1 class="text-center">Order Info</h1>
            <div class="card">

                <table class="table table-bordered">
                    <tr>

                        <th>Order Id</th>
                        <td>{{$order->id}}</td>
                    </tr>
                    <tr>

                        <th>Order Total</th>
                        <td>{{$order->order_total}}</td>
                    </tr>
                    <tr>

                        <th>Order Status </th>
                        <td>{{$order->order_status}}</td>
                    </tr>
                    <tr>

                        <th>Order Date </th>
                        <td>{{$order->created_at}}</td>
                    </tr>



                </table>



            </div>
        </div>
    </div>

    <div class="row">

        <div class="col-md-8 offset-3">

            <h1 class="text-center">Product Info</h1>
            <div class="card">

                <table class="table table-bordered">
                    <tr>

                        <th>Sl No</th>
                        <th>Product ID</th>
                        <th>Product Name </th>
                        <th>Product Price </th>
                        <th>Product Quantity </th>
                        <th>Total Price </th>


                    </tr>
                    @php($i=1)
                    @php($sum=0)
                    @foreach($orderdetails as $orderdetail)
                    <tr>

                        <td>{{$i++}}</td>
                        <td>{{$orderdetail->product_id}}</td>
                        <td>{{$orderdetail->product_name}}</td>
                        <td>{{$orderdetail->product_price}}</td>
                        <td>{{$orderdetail->product_quantity}}</td>
                        <td>{{$orderdetail->product_price*$orderdetail->product_quantity}}</td>
                    </tr>

@endforeach

                </table>



            </div>
        </div>
    </div>
</div>
    @endsection
