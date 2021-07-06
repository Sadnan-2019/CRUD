@extends('admin.master')

@section('body')

    <div class="   col-md-8">
        <div class="card offset-lg-4">

            <div class="card-header"><strong>Edit Category</strong></div>
            <div class="card-body card-block">

                <form action="{{route('update-category')}}" method="post">
                   {{-- <div class="alert alert-success">
                        {{ session()->get('message') }}
                    </div>--}}

                    @csrf
                    <div class="form-group">
                        <label for="company" class=" form-control-label">Category Name</label>
                        <input type="text"  placeholder="Enter your Category Name" name="category" class="form-control"value="{{$categories->category}}">
                        <input type="hidden"  placeholder="Enter your Category Name" name="id" class="form-control"value="{{$categories->id}}">
                    </div>


                    <div class="form-group">
                        <label for="vat" class=" form-control-label">Category Description</label>
                        <input type="text"  placeholder="Enter Category Description" name="categorydescription" class="form-control" value="{{$categories->categorydescription}}">

                    </div>

                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="publicationstatus" id="inlineRadio1" value="1" {{$categories->publicationstatus == 1? 'checked' :''}}>
                        <label class="form-check-label" for="inlineRadio1">Publish</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="publicationstatus" id="inlineRadio2" value="0" {{$categories->publicationstatus == 0? 'checked' : ''}}>
                        <label class="form-check-label" for="inlineRadio2">Unpublish</label>
                    </div>




                    <input class="btn btn-primary" type="submit" value="Submit" name="btn">

                </form>


            </div>
        </div>
    </div>

    @endsection
