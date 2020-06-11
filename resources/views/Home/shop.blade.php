@extends('Home.home-layout')


@section('content')
    <!--================Category Product Area =================-->
    <section class="cat_product_area section_gap">
        <div class="container">
            <div class="row flex-row-reverse">
                <div class="col-lg-12">
                    <div class="product_top_bar">
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="search" placeholder="search by product name or price">
                        </div>
                        <div class="col-sm-4 ">
                            <button class="btn btn-primary float-right">Search</button>
                        </div>
                    </div>

                    <div class="latest_product_inner">
                        <div class="row">
                            @foreach($products as $product)
                                <div class="col-lg-3 col-md-6">
                                    <div class="single-product">
                                        <div class="product-img">
                                            <img class="card-img" width="255px" height="255px" src="{{url('images/products').'/'.$product->image}}"
                                                 alt=""/>
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
                        <div class="text-center">{{$products->links()}}</div>
                    </div>
                </div>

{{--                <div class="col-lg-3">--}}
{{--                    <div class="left_sidebar_area">--}}
{{--                        <aside class="left_widgets p_filter_widgets">--}}
{{--                            <div class="l_w_title">--}}
{{--                                <h3>Browse Categories</h3>--}}
{{--                            </div>--}}
{{--                            <div class="widgets_inner">--}}
{{--                                <ul class="list">--}}
{{--                                    <li>--}}
{{--                                        <a href="#">Frozen Fish</a>--}}
{{--                                    </li>--}}
{{--                                    <li>--}}
{{--                                        <a href="#">Dried Fish</a>--}}
{{--                                    </li>--}}
{{--                                    <li>--}}
{{--                                        <a href="#">Fresh Fish</a>--}}
{{--                                    </li>--}}
{{--                                    <li>--}}
{{--                                        <a href="#">Meat Alternatives</a>--}}
{{--                                    </li>--}}
{{--                                    <li>--}}
{{--                                        <a href="#">Fresh Fish</a>--}}
{{--                                    </li>--}}
{{--                                    <li>--}}
{{--                                        <a href="#">Meat Alternatives</a>--}}
{{--                                    </li>--}}
{{--                                    <li>--}}
{{--                                        <a href="#">Meat</a>--}}
{{--                                    </li>--}}
{{--                                </ul>--}}
{{--                            </div>--}}
{{--                        </aside>--}}
{{--                    </div>--}}
{{--                </div>--}}
            </div>
        </div>
    </section>
    <!--================End Category Product Area =================-->
@endsection
