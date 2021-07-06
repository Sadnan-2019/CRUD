@extends('front-end.master')
@section('body')
    <div class="section-top-border container">
        <div class="row">

            <div class="offset-3 col-lg-5s col-md-5">
                <h3 class="mb-30 title_color">  <br><br><strong>Change Password</strong></h3>
{{--customer er to akta id ace na jar data edit kortecen? ji vai
sei id ta kivabe access kortecen ei page a?wait --}}
                <br>
                <h4 class="text-danger">{{Session::get('meassage')}}</h4>
                <form action="{{route('update-password')}}" method="post">
                    @csrf
                    <div class="mt-10">
                        <label>Old Password</label>
                        <input type="password" name="current_password" placeholder="Current Password" class="form-control">
                        <span class="text-danger">{{$errors->has('current_password') ? $errors->first('current_password'): ''}}</span>

                    </div>

                    <div class="mt-10">
                        <label>New Password</label>
                        <input type="password" name="password" placeholder="New Password" class="form-control">
                        <span class="text-danger"> {{$errors->has('password')?$errors->first('password'):''}}</span>
                    </div>

                    <div class="mt-10">
                        <label>Confirm Password</label>
                        <input type="password" name="password_confirmation" placeholder="Confirm Password" class="form-control">
                    </div>
                    <div class="mt-10">

                        <input type="submit"name="btn" class="main_btn btn-block btn-dark" value="Update">

                    </div>
                 </form>
            </div>









        </div>
    </div>
    @endsection
