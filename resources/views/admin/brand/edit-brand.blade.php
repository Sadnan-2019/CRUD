@extends('admin.master')


@section('body')


    <div class="   col-md-8">
        <div class="card offset-lg-4">
            <div class="card-header"><strong>Add Brand</strong></div>
            <div class="card-body card-block">
                <form action="{{route('update-brand')}}" method="post">

                    <div class="alert alert-success">
                        {{ session()->get('message') }}
                    </div>
                    @csrf
                    <div class="form-group">
                        <label for="company" class=" form-control-label">Brand Name</label>
                        <input type="text"  placeholder="Enter your Brand Name" name="brand" class="form-control" value="{{$brands->brand}}">
                        <input type="hidden"  placeholder="Enter your Brand Name" name="id" class="form-control" value="{{$brands->id}}">
                    </div>
                    <span class="text-danger">{{$errors->has('brand') ? $errors->first('brand') : '' }}</span>
                    <div class="form-group">
                        <label for="vat" class=" form-control-label">Brand Description</label>
                        <input type="text"  placeholder="Enter Brand Description" name="description" class="form-control" value="{{$brands->description}}">
                        <span class="text-danger">{{$errors->has('description')?$errors->first('description')  :  ''}}</span>
                    </div>

                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="publicationstatus" id="inlineRadio1" value="1" {{$brands->publicationstatus==1?'checked' :''}}>
                        <label class="form-check-label" for="inlineRadio1">Publish</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="publicationstatus" id="inlineRadio2" value="0" {{$brands->publicationstatus==0 ? 'checked' :  ''}}>
                        <label class="form-check-label" for="inlineRadio2">Unpublish</label>
                    </div>
                    <span class="text-danger">{{$errors->has('publicationstatus')? $errors->first('publicationstatus'):  ''}}</span>



                    <input class="btn btn-primary" type="submit" value="Submit" name="btn">

                </form>


            </div>
        </div>
    </div>


















    @endsection
