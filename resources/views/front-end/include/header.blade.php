<header class="header_area">
    <div class="top_menu">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <div class="float-left">
                        <p>Phone: +01 256 25 235</p>
                        <p>email: info@eiser.com</p>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="float-right">
                        <ul class="right_side">
                            <li>
                                <a href="cart.html">
                                    gift card
                                </a>
                            </li>
                            <li>
                                <a href="tracking.html">
                                    track order
                                </a>
                            </li>
                            <li>
                                <a href="contact.html">
                                    Contact Us
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="main_menu">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light w-100">
                <!-- Brand and toggle get grouped for better mobile display -->
                <a class="navbar-brand logo_h" href="index.html">
                    <img src="{{asset('/')}}/front/img/logo.png" alt="" />
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse offset w-100" id="navbarSupportedContent">
                    <div class="row w-100 mr-0">
                        <div class="col-lg-7 pr-0">
                            <ul class="nav navbar-nav center_nav pull-right">
                                <li class="nav-item active">
                                    <a class="nav-link" href="{{route('/')}}">Home</a>
                                </li>
                            @foreach($categorieshome as $category)
                                <li class="nav-item active">
                                    <a class="nav-link" href="{{route('category',['id'=>$category->id])}}">{{$category->category}}</a>
                                </li>
                              @endforeach


                            </ul>
                        </div>

                        <div class="col-lg-5 pr-0">
                            <ul class="nav navbar-nav navbar-right right_nav pull-right">
                                <li class="nav-item">
                                    <a href="#" class="icons">
                                        <i class="ti-search" aria-hidden="true"></i>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="{{route('show-cart')}}" class="icons">
                                        <i class="ti-shopping-cart"></i>
                                    </a>
                                </li>


                                <li class="nav-item">
                                    <a href=" " class="icons">
                                         <h6>{{Session::get('customerName')}}</h6>
                                    </a>
                                </li>



                               @if(Session::get('customerId'))
                                <li class="nav-item">
                                    <a href="{{route('customer-logout')}}" class="icons" onclick="event.preventDefault();
                                                     document.getElementById('customer-logout-form').submit();">
                                      Logout
                                    </a>

                                    <a class="icons" href="{{route('change-password')}}"><span class="icon_btn">Change Password</span> </a>


                              <form id="customer-logout-form" method="post" action="{{route('customer-logout')}}">
                                        @csrf


                                    </form>

                                </li>
                                {{--@elseif(Session::get('customerId') && Session::get('customerName'))--}}

                                   {{-- <li class="nav-item">
                                        <a class="icons" href="{{route('change-password')}}"><span class="icon_btn"><i class="fas fa-cog"></i></span></a>
                                    </li>--}}
                                {{--@elseif(Session::get('customerId') && Session::get('customerName'))--}}

                                @else
                                    <li class="nav-item">
                                    <a href="{{route('new-customer-login')}}" class="icons nav-link">
                                      Login
                                    </a>
                                </li>
                                @endif

                                <li class="nav-item">
                                    <a href="#" class="icons">
                                        <i class="ti-heart" aria-hidden="true"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</header>
