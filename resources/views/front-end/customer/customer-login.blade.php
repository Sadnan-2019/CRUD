@extends('front-end.master')

@section('body')

    <div class="section-top-border container">
        <div class="row">

            <div class="offset-3 col-lg-5s col-md-5">
                <h3 class="mb-30 title_color">If you Already Register User  <br><br><strong>Please Login</strong></h3>

                <br>
                <h4 class="text-danger">{{Session::get('meassage')}}</h4>

                <form action="{{route('only-customer-login')}}" method="post">
                    @csrf



                    <div class="mt-10">
                        <label>Email</label>
                        <input type="email" name="email" placeholder="Email address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email address'"
                               required class="single-input">
                    </div>

                    <div class="mt-10">
                        <label>Password</label>
                        <input type="password" name="password" placeholder="Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password'"
                               class="single-input">
                    </div>


                    <div class="mt-10">

                        <input type="submit"name="btn" class="main_btn btn-block btn-dark" value="Login">

                    </div>

                    <h3 class="mb-30 title_color text-center">If you are a new user <a class="btn"  href="{{route('register-page')}}">Register Here</a></h3>
                </form>
            </div>









        </div>
    </div>









    @endsection



