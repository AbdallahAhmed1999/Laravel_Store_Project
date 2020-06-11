@extends('Home.home-layout')

@section('content')
    <section class="home_banner_area mb-40">
        <div class="banner_inner d-flex align-items-center">
            <div class="container">
                <div class="banner_content row">
                    <div class="col-lg-12">
                        <p class="sub text-uppercase">men Collection</p>
                        <h3><span>Show</span> Your <br>Personal <span>Style</span></h3>
                        <h4>Fowl saw dry which a above together place.</h4>
                        <a class="main_btn mt-40" href="{{route('shop')}}">Shop</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="feature-area section_gap_bottom_custom">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="single-feature">
                        <a href="#" class="title">
                            <i class="flaticon-money"></i>
                            <h3>Money back gurantee</h3>
                        </a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="single-feature">
                        <a href="#" class="title">
                            <i class="flaticon-truck"></i>
                            <h3>Free Delivery</h3>
                        </a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="single-feature">
                        <a href="#" class="title">
                            <i class="flaticon-support"></i>
                            <h3>Alway support</h3>
                        </a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="single-feature">
                        <a href="#" class="title">
                            <i class="flaticon-blockchain"></i>
                            <h3>Payment when receiving</h3>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================ New Product Area =================-->
    <section class="new_product_area section_gap_top section_gap_bottom_custom">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="main_title">
                        <h2><span>new products</span></h2>
                        <p>The Latest Products Added</p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6">
                    <div class="new_product">
                        <h5 class="text-uppercase">The Newest Product in our Shop</h5>
                        <h3 class="text-uppercase">{{$products[0]->name}}</h3>
                        <div class="product-img">
                            <img class="img-fluid" src="{{url('images/products') .'/'. $products[0]->image}}" alt=""/>
                        </div>
                        <h4>${{$products[0]->price}}</h4>
                        <a href="{{route('product.show',$products[0]->id)}}" class="main_btn">Show</a>
                    </div>
                </div>

                <div class="col-lg-6 mt-5 mt-lg-0">
                    <div class="row">
                        @foreach($products as $product)
                            @if($products[0] === $product)
                                @continue
                            @endif
                            <div class="col-lg-6 col-md-6">
                                <div class="single-product">
                                    <div class="product-img">
                                        <img class="img-fluid w-100"
                                             src="{{url('images/products') .'/'. $product->image}}" alt=""/>
                                    </div>
                                    <div class="product-btm">
                                        <a href="{{route('product.show',$product->id)}}" class="d-block">
                                            <h4>{{$product->name}}</h4>
                                        </a>
                                        <div class="mt-3">
                                            <span class="mr-4">${{$product->price}}</span>
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

@endsection
