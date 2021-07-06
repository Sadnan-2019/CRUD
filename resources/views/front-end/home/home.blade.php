@extends('front-end.master')

@section('title')

    Home
    @endsection

@section('body')


    <section class="home_banner_area mb-40">
        <div class="banner_inner d-flex align-items-center">
            <div class="container">
                <div class="banner_content row">
                    <div class="col-lg-12">
                        <p class="sub text-uppercase">men Collection</p>
                        <h3><span>Show</span> Your <br />Personal <span>Style</span></h3>
                        <h4>Fowl saw dry which a above together place.</h4>
                        <a class="main_btn mt-40" href="#">View Collection</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Home Banner Area =================-->

    <!-- Start feature Area -->
    <section class="feature-area section_gap_bottom_custom">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="single-feature">
                        <a href="#" class="title">
                            <i class="flaticon-money"></i>
                            <h3>Money back gurantee</h3>
                        </a>
                        <p>Shall open divide a one</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="single-feature">
                        <a href="#" class="title">
                            <i class="flaticon-truck"></i>
                            <h3>Free Delivery</h3>
                        </a>
                        <p>Shall open divide a one</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="single-feature">
                        <a href="#" class="title">
                            <i class="flaticon-support"></i>
                            <h3>Alway support</h3>
                        </a>
                        <p>Shall open divide a one</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="single-feature">
                        <a href="#" class="title">
                            <i class="flaticon-blockchain"></i>
                            <h3>Secure payment</h3>
                        </a>
                        <p>Shall open divide a one</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End feature Area -->

    <!--================ Feature Product Area =================-->
    <section class="feature_product_area section_gap_bottom_custom">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="main_title">
                        <h2><span>Featured product</span></h2>
                        <p>Bring called seed first of third give itself now ment</p>
                    </div>
                </div>
            </div>

            <div class="row">
            @foreach($featureproducts as $featureproduct)



                <div class="col-lg-4 col-md-6">
                    <div class="single-product">
                        <div class="product-img">
                            <img class="img-fluid w-100" src="{{asset($featureproduct->photo)}} " alt="" />
                            <div class="p_icon">
                                <a href="#">
                                    <i class="ti-eye"></i>
                                </a>
                                <a href="#">
                                    <i class="ti-heart"></i>
                                </a>
                                <a href="#">
                                    <i class="ti-shopping-cart"></i>
                                </a>
                            </div>
                        </div>
                        <div class="product-btm">
                            <a href="{{route('product-details',['id'=>$featureproduct->id,'name'=>$featureproduct->productname])}}" class="d-block">
                                <h4>{{$featureproduct->productname}}</h4>
                            </a>
                            <div class="mt-3">
                                <span class="mr-4">{{$featureproduct->productprice}}</span>
                                <del>$35</del>
                            </div>
                        </div>
                    </div>
                </div>

                @endforeach
            </div>
        </div>
    </section>
    <!--================ End Feature Product Area =================-->


    <!--================ Offer Area =================-->
    <div class="col-lg-12">
        <div class="main_title">
            <h2><span>OFFER PRODUCT</span></h2>
            <p>Bring called seed first of third give itself now ment</p>
        </div>
    </div>
    <section class="offer_area">

        <div class="container">

            <div class="row justify-content-center">

                <div class="offset-lg-4 col-lg-6 text-center">

                    <div class="offer_content">
                        <h3 class="text-uppercase mb-40">all men’s collection</h3>
                        <h2 class="text-uppercase">50% off</h2>
                        <a href="#" class="main_btn mb-20 mt-5">Discover Now</a>
                        <p>Limited Time Offer</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================ End Offer Area =================-->

    <!--================ New Product Area =================-->
    <section class="new_product_area section_gap_top section_gap_bottom_custom">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="main_title">
                        <h2><span>new products</span></h2>
                        <p>Bring called seed first of third give itself now ment</p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6">
                    <div class="new_product">
                        @foreach($offerproducts as $offerproduct)
                        <h5 class="text-uppercase">collection of 2019</h5>
                        <h3 class="text-uppercase">Men’s summer t-shirt</h3>

                        <div class="product-img">
                            <img class="img-fluid" src="{{asset($offerproduct->photo)}}" alt="" />
                        </div>
                        <h4>TK.{{$offerproduct->productprice}}</h4>
                            <a href="{{route('product-details',['id'=>$offerproduct->id,'name'=>$offerproduct->productname])}}" class="d-block">

                                <h2>{{$offerproduct->productname}}</h2>
                            </a>

                            @endforeach
                    </div>
                </div>

                <div class="col-lg-6 mt-5 mt-lg-0">

                    <div class="row">

                        @foreach($newproduct as $product)





                        <div class="col-lg-6 col-md-6">
                            <div class="single-product">
                                <div class="product-img">
                                    <img class="img-fluid w-100" src="{{asset($product->photo)}}" alt="" />
                                    <div class="p_icon">
                                        <a href="#">
                                            <i class="ti-eye"></i>
                                        </a>
                                        <a href="#">
                                            <i class="ti-heart"></i>
                                        </a>
                                        <a href="#">
                                            <i class="ti-shopping-cart"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="product-btm">
                                    <a href="{{route('product-details',['id'=>$product->id,'name'=>$product->productname])}}" class="d-block">
                                        <h4>{{$product->productname}}</h4>
                                    </a>
                                    <div class="mt-3">
                                        <span class="mr-4">TK.{{$product->productprice}}</span>
                                        <del>$35.00</del>
                                    </div>
                                </div>
                            </div>
                        </div>

                            @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================ End New Product Area =================-->

    <!--================ Inspired Product Area =================-->
    <section class="inspired_product_area section_gap_bottom_custom">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="main_title">
                        <h2><span>Inspired products</span></h2>
                        <p>Bring called seed first of third give itself now ment</p>
                    </div>
                </div>
            </div>

            <div class="row">
                @foreach($inspiredproducts as $inspiredproduct)
                <div class="col-lg-3 col-md-6">
                    <div class="single-product">
                        <div class="product-img">
                            <img class="img-fluid w-100" src="{{asset($inspiredproduct->photo)}}"  />
                            <div class="p_icon">
                                <a href="#">
                                    <i class="ti-eye"></i>
                                </a>
                                <a href="#">
                                    <i class="ti-heart"></i>
                                </a>
                                <a href="#">
                                    <i class="ti-shopping-cart"></i>
                                </a>
                            </div>
                        </div>
                        <div class="product-btm">
                            <a href="{{route('product-details',['id'=>$inspiredproduct->id,'name'=>$inspiredproduct->productname])}}" class="d-block">
                                <h4>{{$inspiredproduct->productname}}</h4>
                            </a>
                            <div class="mt-3">
                                <span class="mr-4">{{$inspiredproduct->productprice}}</span>
                                <del>$35.00</del>
                            </div>
                        </div>
                    </div>
                </div>







@endforeach






            </div>
        </div>
    </section>
    <!--================ End Inspired Product Area =================-->

    <!--================ Start Blog Area =================-->
    <section class="blog-area section-gap">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="main_title">
                        <h2><span>latest blog</span></h2>
                        <p>Bring called seed first of third give itself now ment</p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="single-blog">
                        <div class="thumb">
                            <img class="img-fluid" src="{{asset('/')}}/front/img/b1.jpg" alt="">
                        </div>
                        <div class="short_details">
                            <div class="meta-top d-flex">
                                <a href="#">By Admin</a>
                                <a href="#"><i class="ti-comments-smiley"></i>2 Comments</a>
                            </div>
                            <a class="d-block" href="{{asset('/')}}/front/single-blog.html">
                                <h4>Ford clever bed stops your sleeping
                                    partner hogging the whole</h4>
                            </a>
                            <div class="text-wrap">
                                <p>
                                    Let one fifth i bring fly to divided face for bearing the divide unto seed winged divided light
                                    Forth.
                                </p>
                            </div>
                            <a href="#" class="blog_btn">Learn More <span class="ml-2 ti-arrow-right"></span></a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="single-blog">
                        <div class="thumb">
                            <img class="img-fluid" src="{{asset('/')}}/front/img/b2.jpg" alt="">
                        </div>
                        <div class="short_details">
                            <div class="meta-top d-flex">
                                <a href="#">By Admin</a>
                                <a href="#"><i class="ti-comments-smiley"></i>2 Comments</a>
                            </div>
                            <a class="d-block" href="{{asset('/')}}/front/single-blog.html">
                                <h4>Ford clever bed stops your sleeping
                                    partner hogging the whole</h4>
                            </a>
                            <div class="text-wrap">
                                <p>
                                    Let one fifth i bring fly to divided face for bearing the divide unto seed winged divided light
                                    Forth.
                                </p>
                            </div>
                            <a href="#" class="blog_btn">Learn More <span class="ml-2 ti-arrow-right"></span></a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="single-blog">
                        <div class="thumb">
                            <img class="img-fluid" src="{{asset('/')}}/front/img/b3.jpg" alt="">
                        </div>
                        <div class="short_details">
                            <div class="meta-top d-flex">
                                <a href="#">By Admin</a>
                                <a href="#"><i class="ti-comments-smiley"></i>2 Comments</a>
                            </div>
                            <a class="d-block" href="{{asset('/')}}/front/single-blog.html">
                                <h4>Ford clever bed stops your sleeping
                                    partner hogging the whole</h4>
                            </a>
                            <div class="text-wrap">
                                <p>
                                    Let one fifth i bring fly to divided face for bearing the divide unto seed winged divided light
                                    Forth.
                                </p>
                            </div>
                            <a href="#" class="blog_btn">Learn More <span class="ml-2 ti-arrow-right"></span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endsection
