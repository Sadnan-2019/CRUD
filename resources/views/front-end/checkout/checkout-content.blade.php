@extends('front-end.master')
@section('body')


    <div class="section-top-border container">
        <div class="row">
            <div class="offset-1 col-lg-6s col-md-6">
                <h3 class="mb-30 title_color">If you are a new user <strong>Register Here</strong></h3>
                <form action="{{route('new-customer')}}" method="post">
                    @csrf
                    <div class="mt-10">
                        <input type="text" name="first_name" placeholder="First Name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'First Name'"
                               required class="single-input">
                    </div>
                    <div class="mt-10">
                        <input type="text" name="last_name" placeholder="Last Name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Last Name'"
                               required class="single-input">
                    </div>

                    <div class="mt-10">
                        <input type="email" name="email" placeholder="Email address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email address'"
                               required class="single-input">
                    </div>

                    <div class="mt-10">
                        <input type="number" name="phone" placeholder="Phone Number" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Phone Number'"
                               required class="single-input">
                    </div>

                    <div class="mt-10">
                        <input type="password" name="password" placeholder="Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password'"
                               required class="single-input">
                    </div>




                    <div class="mt-10">
								<textarea class="single-textarea" name="address" placeholder="Address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Address'"
                                          required></textarea>
                    </div>

             <div class="mt-10">

                 <input type="submit"name="btn" class="main_btn" value="Register">

             </div>

                </form>
            </div>











            <div class="  col-lg-5s col-md-5">
                <h3 class="mb-30 title_color">If you Already Register User  <br><strong>Login</strong></h3>

                <br>
                <h4 class="text-danger">{{Session::get('meassage')}}</h4>

                <form action="{{route('customer-login')}}" method="post">
                    @csrf



                    <div class="mt-10">
                        <input type="email" name="email" placeholder="Email address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email address'"
                               required class="single-input">
                    </div>



                    <div class="mt-10">
                        <input type="password" name="password" placeholder="Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password'"
                                 class="single-input">
                    </div>






             <div class="mt-10">

                 <input type="submit"name="btn" class="main_btn btn-block" value="Login">

             </div>

                </form>
            </div>










        </div>
    </div>



    @endsection
