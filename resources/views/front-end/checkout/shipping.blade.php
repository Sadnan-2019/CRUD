@extends('front-end.master')

@section('body')
    <div class="section-top-border container">
        <div class="row">
            <div class="offset-1 col-lg-6s col-md-5">
                <h3 class="mb-30 title_color">Please give us your shipping info</h3>
                <form action="{{route('new-shipping')}}" method="post">
                    @csrf

                    <div class="mt-10">
                        <label>First Name</label>
                        <input type="text" name="firstname" placeholder="First Name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'First Name'"
                               required    value="{{$customerinfo->first_name}}" class="single-input">
                    </div>
                    <div class="mt-10">
                        <label>Last Name</label>
                        <input type="text" name="lastname" placeholder="Last Name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Last Name'"
                               required    value="{{$customerinfo->last_name}}" class="single-input">
                    </div>

                    <div class="mt-10">
                        <label>Email address</label>
                        <input type="email" name="email" placeholder="Email address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email address'"
                               required  value="{{$customerinfo->email}}" class="single-input">
                    </div>

                    <div class="mt-10">
                        <label>Phone Number</label>
                        <input type="number" name="phone" placeholder="Phone Number" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Phone Number'"
                               required  value="{{$customerinfo->phone}}" class="single-input">
                    </div>






                    <div class="mt-10">
                        <label>Address</label>
								<textarea class="single-textarea" name="address" placeholder="Address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Address'"
                                          required  >{{$customerinfo->address}} </textarea>
                    </div>

                    <div class="mt-10">

                        <input type="submit"name="btn" class="main_btn" value="Save Shipping Info">

                    </div>

                </form>
            </div>

        </div>
    </div>
    @endsection
