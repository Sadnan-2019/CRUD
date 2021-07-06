@extends('admin.master')

@section('body')
<div class="container">
    <div class="row">

        <div class="col-md-12">

            <div class="offset-4">
            <h3 class="text-center">Manage Order</h3>

<table class="table table-bordered">
    <tr>

        <th>Sl No</th>
        <th>Customer Name</th>
        <th>Order Total</th>
        <th>Order Date</th>
        <th>Order Status</th>
        <th>Payment Type</th>
        <th>Payment Status</th>
        <th>Action</th>

    </tr>

@php($id=1)
    @foreach($orders as $order)
    <tr>
        <td>{{$id++}}</td>
        <td>{{$order->first_name.$order->last_name}}</td>
        <td>{{$order->order_total}}</td>
        <td>{{$order->created_at}}</td>
        <td>{{$order->order_status}}</td>
        <td>{{$order->payment_type}}</td>
        <td>{{$order->payment_status}}</td>

        <td>

            <a href="{{route('view-orders-details',['id'=>$order->id])}}" class="btn btn-info">
                <span>
                    <i class="fa fa-search-plus"></i>
                </span>
            </a>


            <a href="{{route('view-order-invoice',['id'=>$order->id])}}" class="btn btn-success">
                <span><i class="fa fa-file-invoice">

                    </i>
                </span>
            </a>
            <a class="btn btn-danger">
                <span><i class="fa fa-trash">

                    </i></span>
            </a>
            <a class="btn btn-dark">
                <span><i class="fa fa-check-square"></i>
                </span>
            </a>


        </td>

    </tr>

@endforeach


</table>


        </div>
        </div>
    </div>


</div>
    @endsection
