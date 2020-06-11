@extends('Home.home-layout')


@section('content')
    <!--================Home Banner Area =================-->
    <section class="banner_area">
        <div class="banner_inner d-flex align-items-center">
            <div class="container">
                <div
                    class="banner_content d-md-flex justify-content-between align-items-center"
                >
                    <div class="mb-3 mb-md-0">
                        <h2>{{$product->name}} Details</h2>
                    </div>
                    <div class="page_link">
                        <a href="{{route('home')}}">Home</a>
                        <a href="{{route('product.show', $product->id)}}">{{$product->name}} Details</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Home Banner Area =================-->

    <!--================Single Product Area =================-->
    <div class="product_image_area">
        <div class="container">
            <div class="row s_product_inner">
                <div class="col-lg-6">
                    <div class="s_product_img">
                        <img src="{{url('images/products').'/'.$product->image}}" alt="">
                    </div>
                </div>
                <div class="col-lg-5 offset-lg-1">
                    <div class="s_product_text">
                        <h3>{{$product->name}}</h3>
                        <h2>${{$product->price}}</h2>
                        <ul class="list">
                            <li>
                                <span>Category :</span>
                                @foreach($product->categories as $category)
                                    <a href="#">{{$category->name}}</a>
                                @endforeach
                            </li>
                        </ul>
                        <p>{{$product->description}}</p>
                        <form action="{{route('cart.addProduct',$product->id)}}" method="POST">
                            @csrf
                            <div class="product_count">
                                <label for="quantity">Quantity:</label>
                                <input type="text" name="quantity" id="sst" maxlength="12" value="1" title="Quantity:"
                                       class="input-text qty"/>
                                <button
                                    onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst )) result.value++;return false;"
                                    class="increase items-count"
                                    type="button">
                                    <i class="lnr lnr-chevron-up"></i>
                                </button>
                                <button
                                    onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst ) &amp;&amp; sst > 1 ) result.value--;return false;"
                                    class="reduced items-count"
                                    type="button">
                                    <i class="lnr lnr-chevron-down"></i>
                                </button>
                            </div>
                            <div class="card_area">
                                <button type="submit" class="main_btn">Add to Cart</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--================End Single Product Area =================-->
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
@endsection
