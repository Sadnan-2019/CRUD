@extends('admin.master')


@section('body')


    <div class="   col-md-11">


        <div class="card offset-lg-4">
            <h1 class="text-success text-center">Category Details</h1>
            <div class="alert alert-success">
               {{session()->get('message')}}

            </div>


            <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                    <thead>

                    <tr>


                        <th>Serial No</th>
                        <th>Category Name</th>
                        <th>Category Description</th>
                        <th>Publication Status</th>
                        <th>Action</th>
                    </tr>

                    </thead>

                        <tbody>

                        @php($i=1)
                        @foreach($categories as $categoty)

                            <tr>

                            <td>{{$i++}}</td>
                            <td>{{$categoty->category}}</td>
                            <td>{{$categoty->categorydescription}}</td>
                            <td>{{$categoty->publicationstatus==1  ?   'published':'unpublished' }}</td>


                            <td>
                                  @if($categoty->publicationstatus ==1)
                                    <a href="{{route('unpublished-category',['id'=>$categoty->id])}}" class="btn btn-info">

                             <span><i class="fa fa-arrow-up"></i></span>
                                    </a>

                                    @else
                                    <a href="{{route('published-category',['id'=>$categoty->id])}}" class="btn btn-warning">

                             <span><i class="fa fa-arrow-down"></i></span>
                                    </a>
                             @endif


                                <a href="{{route('edit-category',['id'=>$categoty->id])}}" class="btn btn-success">

                             <span>
                                 <i class="fa fa-edit"></i></span>
                                </a>
                                <a href="{{route('delete-category',['id'=>$categoty->id])}}" class="btn btn-danger">

                             <span>
                                 <i class="fa fa-trash"></i></span>
                                </a>



                            </td>





                        </tr>
                       @endforeach
                        </tbody>

                </table>
            </div>



        </div>
    </div>



    @endsection
