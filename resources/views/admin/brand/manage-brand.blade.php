@extends('admin.master')

@section('body')



 <div class="   col-md-11">


     <div class="card offset-lg-4">
         <h1 class="text-center text-success">Brand Details</h1>
         <div class="alert alert-success">
             {{ session()->get('message') }}
         </div>


         <div class="card-body">
             <table id="example2" class="table table-bordered table-hover">
                 <thead>
                 <tr>


                     <th>Serial No</th>
                     <th>Brand Name</th>
                     <th>Brand Description</th>
                     <th>Publication Status</th>
                     <th>Action</th>
                 </tr>

                 </thead>
                      @php($i=1)
                      @foreach($brands as $brand)
                 <tbody>



                 <tr>

                     <td>{{$i++}}</td>
                     <td>{{$brand->brand}}</td>
                     <td>{{$brand->description}}</td>
                     <td>{{$brand->publicationstatus == 1 ? 'published' : 'unpublished'}}</td>


                     <td>
                    @if($brand->publicationstatus==1)
                         <a href="{{route('unpublish-brand',['id'=>$brand->id])}}" class="btn btn-info">

                             <span>
                                 <i class="fa fa-arrow-up"></i></span>
                         </a>
                         @else
                             <a href="{{route('published-brand',['id'=>$brand->id])}}" class="btn btn-warning">

                             <span>
                                 <i class="fa fa-arrow-down"></i></span>
                             </a>
                         @endif

                         <a href="{{route('edit-brand',['id'=>$brand->id])}}" class="btn btn-success">

                             <span>
                                 <i class="fa fa-edit"></i></span>
                         </a>
                         <a href="{{route('delete-brand',['id'=>$brand->id])}}" class="btn btn-danger">

                             <span>
                                 <i class="fa fa-trash"></i></span>
                         </a>



                     </td>





                 </tr>

                 </tbody>
@endforeach
             </table>
         </div>



     </div>
 </div>


    @endsection
