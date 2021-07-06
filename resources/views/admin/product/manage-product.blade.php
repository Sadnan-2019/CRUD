@extends('admin.master')


@section('body')

    <div class="col-lg-12">


        <div class="card ">

            <h1 class="text-center text-success">Product Details </h1>
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>


                <table  class="table table-bordered">
                    <thead>
                    <tr>


                        <th>Serial No</th>
                        <th>CategoryId</th>
                        <th>BrandId</th>
                        <th>Productname</th>
                        <th>Productdescription</th>
                        <th>Product Price</th>
                        <th>Product Quantity</th>
                        <th>photo</th>
                        <th>Publication Status</th>
                        <th>Action</th>

                    </tr>

                    </thead>
                    @php($i=1)
                    @foreach($products as $product)

                        <tbody>



                        <tr>

                            <td>{{$i++}}</td>
                            <td>{{$product->category}}</td>
                            <td>{{$product->brand}}</td>
                            <td>{{$product->productname}}</td>
                            <td>{{$product->productdescription}}</td>
                            <td>{{$product->productprice}}</td>
                            <td>{{$product->productquantity}}</td>
                            <td><img src="{{asset($product->photo)}}" ></td>
                            <td>{{$product->publicationstatus ==1 ? 'Published':'Unpublished'}}</td>



                            <td>
                             @if($product->publicationstatus == 1)
                            <a href="{{route("unpublish-product",['id'=>$product->id])}}" class="btn btn-info">

                                <span><i class="fa fa-arrow-up"></i></span>


                            </a>
                                @else
                                    <a href="{{route("publish-product",['id'=>$product->id])}}" class="btn btn-warning">

                                        <span><i class="fa fa-arrow-down"></i></span>


                                    </a>
                                @endif

                                <a href="{{route("edit-product",['id'=>$product->id])}}" class="btn btn-success">

                                <span><i class="fa fa-edit"></i></span>


                            </a>


                                <a href="{{route("delete-product",['id'=>$product->id])}}" class="btn btn-danger">

                                <span><i class="fa fa-trash"></i></span>


                            </a>



                            </td>

                        </tr>





                        </tbody>
@endforeach
                </table>




        </div>
    </div>









    @endsection
