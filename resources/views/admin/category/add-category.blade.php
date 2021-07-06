@extends('admin.master')

@section('body')

    <div class="   col-md-8">
        <div class="card offset-lg-4">

            <div class="card-header"><strong>Add Category</strong></div>
            <div class="card-body card-block">

                <form action="{{route('save-category')}}" method="post">
                    <div class="alert alert-success">
                        {{ session()->get('message') }}
                    </div>

                    @csrf
                    <div class="form-group">
                        <label for="company" class=" form-control-label">Category Name</label>
                        <input type="text"  placeholder="Enter your Category Name" name="category" class="form-control"></div>
                    <span class="text-danger">{{$errors->has('category')?$errors->first('category'):  ''}}</span>

                    <div class="form-group">
                        <label for="vat" class=" form-control-label">Category Description</label>
                        <input type="text"  placeholder="Enter Category Description" name="categorydescription" class="form-control">
                        <span class="text-danger">{{$errors->has('categorydescription') ? $errors->first('categorydescription'): ''}}</span>

                    </div>

                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="publicationstatus" id="inlineRadio1" value="1">
                        <label class="form-check-label" for="inlineRadio1">Publish</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="publicationstatus" id="inlineRadio2" value="0">
                        <label class="form-check-label" for="inlineRadio2">Unpublish</label>
                    </div>

                    <span class="text-danger">{{$errors->has('publicationstatus')?$errors->first('publicationstatus') :  ''}}</span>


                    <input class="btn btn-primary" type="submit" value="Submit" name="btn">

                </form>


            </div>
        </div>
    </div>



    @endsection
