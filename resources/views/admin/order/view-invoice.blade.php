@extends('admin.master')

@section('body')
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->

    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-3">
                <div class="card">
                    <div class="card-body p-0">
                        <div class="row p-5">
                            <div class="col-md-6">
                                <img src="{{asset('http://localhost/CRUD-20210402T175447Z-001/CRUD/public//front/img/logo.png')}}">
                            </div>

                            <div class="col-md-6 text-right">
                                <p class="font-weight-bold mb-1">Invoice {{$orders->id}}</p>
                                <p class="font-weight-bold mb-1">Due to:{{$orders->updated_at}}</p>
                            </div>
                        </div>

                        <hr class="my-5">

                        <div class="row pb-5 p-5">
                            <div class="col-md-6">
                                <p class="font-weight-bold mb-4"></p>
                                <p class="font-weight-bold mb-1">{{$customer->first_name.$customer->last_name}}</p>
                                <p class="font-weight-bold mb-1">{{$customer->address}}</p>
                                <p class="font-weight-bold mb-1">{{$customer->phone}}</p>
                            </div>

                            <div class="col-md-6 text-right">
                                <p class="font-weight-bold mb-4">Payment Details</p>
                                <p class="font-weight-bold mb-1"><span >Payment Id:{{$payment->id}}</span> </p>
                                 <p class="font-weight-bold mb-1"><span >Payment Type:{{$payment->payment_type}} </span></p>
                            </div>
                        </div>

                        <div class="row p-5">
                            <div class="col-md-12">
                                <table class="table table-bordered">
                                    <tr>

                                        <th>Sl No</th>
                                        <th>Product ID</th>
                                        <th>Product Name </th>
                                        <th>Product Quantity </th>
                                        <th>Product Price </th>

                                        <th>Total Price </th>


                                    </tr>
                                    @php($i=1)
                                    @php($sum=0)
                                    @foreach($orderdetails as $orderdetail)
                                        <tr>

                                            <td>{{$i++}}</td>
                                            <td>{{$orderdetail->product_id}}</td>
                                            <td>{{$orderdetail->product_name}}</td>
                                            <td>{{$orderdetail->product_quantity}}</td>
                                            <td>TK.{{$orderdetail->product_price}}</td>

                                            <td>TK.{{$total=$orderdetail->product_quantity*$orderdetail->product_price}}</td>
                                        </tr>
                                        @php($sum=$sum+$total)
                                    @endforeach

                                </table>
                            </div>
                        </div>

                        <div class="d-flex flex-row-reverse bg-dark text-white p-4">
                            <div class="py-3 px-5 text-right">
                                <div class="mb-2">Grand Total</div>
                                <div class="h2 font-weight-light">TK{{$ordertotal=$sum+$del=50}}</div>
                            </div>

                            <div class="py-3 px-5 text-right">
                                <div class="mb-2">Delivey Charge</div>
                                <div class="h2 font-weight-light">{{$del = 50}}</div>
                            </div>

                            <div class="py-3 px-5 text-right">
                                <div class="mb-2">Sub - Total amount</div>
                                <div class="h2 font-weight-light">{{$ordertotal=$sum}}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>


    <div class="container">
        <div class="row">
            <div class="col-lg-4 offset-7">
                <a href="{{route('download-invoice',['id'=>$orders->id])}}" class="text-center btn btn-success">Print Invoice</a>
            </div>
        </div>

    </div>

    @endsection
