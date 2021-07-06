@extends('admin.master')
@section('body')







    <div class="   col-md-8">
        <div class="card offset-lg-4">
            <div class="card-header"><strong>Add Product</strong></div>
            <div class="card-body card-block">
                <form action="{{route('save-product')}}" method="post"  enctype="multipart/form-data">
                    @csrf
                    <div class="alert alert-success">
                        {{ session()->get('message') }}
                    </div>


                   <div class="form-group">
                      <label>Select Category</label>
                       <select class="form-control" name="CategoryId">
                           <option selected>--Select Category--</option>
                          @foreach($categories as $category)

                           <option value="{{$category->id}}">{{$category->category}}</option>
                           @endforeach
                       </select>


                   </div>



                    <div class="form-group">
                      <label>Select Brand</label>
                       <select class="form-control"  name="BrandId">
                           <option selected>--Select Brand--</option>

                       @foreach($brands as $brand)
                           <option value="{{$brand->id}}">{{$brand->brand}}</option>
                           @endforeach
                       </select>


                   </div>


                    <div class="form-group">
                        <label for="company" class=" form-control-label">Product Name</label>
                        <input type="text"  placeholder="Enter your Product Name" name="productname" class="form-control"></div>

                    <div class="form-group">
                        <label for="vat" class=" form-control-label">Product Description</label>
                        <input type="text"  placeholder="Enter Product Description" name="productdescription" class="form-control">

                    </div>

                    <div class="form-group">
                        <label for="vat" class=" form-control-label">Product Price</label>
                        <input type="text"  placeholder="Enter Product Price" name="productprice" class="form-control">

                    </div>


                    <div class="form-group">
                        <label for="vat" class=" form-control-label">Product Quantity</label>
                        <input type="text"  placeholder="Enter Product Quantity" name="productquantity" class="form-control">

                    </div>

                    <div class="form-group">
                        <label for="vat" class=" form-control-label">Photo</label>
                        <input type="file"  placeholder="Upload Picture" name="photo" class="form-control">

                    </div>



                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="publicationstatus" id="inlineRadio1" value="1">
                        <label class="form-check-label" for="inlineRadio1">Publish</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="publicationstatus" id="inlineRadio2" value="0">
                        <label class="form-check-label" for="inlineRadio2">Unpublish</label>
                    </div>




                    <input class="btn btn-primary" type="submit" value="Submit" name="btn">

                </form>


            </div>
        </div>
    </div>




















    @endsection
