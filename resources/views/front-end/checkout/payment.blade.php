@extends('front-end.master')


@section('body')
<div class="row">


    <div class="col-md-8 offset-2">
        <h1 class="text-center">Select Payment Type</h1>

    <div class="card">

        <div class="card-body">
            <form method="post"   action="{{route('new-order')}}" >
@csrf
<table  class=" table table-bordered">

 <tr>

     <th>Cash on Delivery</th>
     <td><input type="radio" name="payment_type" value="Cash">Cash on Delivery</td>

 </tr>

    <tr>

     <th>Bkash</th>
     <td><input type="radio" name="payment_type" value="bkash">Bkash</td>

 </tr>
    <tr>

     <th>Paypel</th>
     <td><input type="radio" name="payment_type" value="paypal">Paypal</td>

 </tr>


    <tr>
        <td></td>
        <td><input type="submit" name="btn" value="Confirm Order" class="main_btn"></td>



    </tr>


</table>


            </form>


        </div>
    </div>
    </div>
</div>
    @endsection
