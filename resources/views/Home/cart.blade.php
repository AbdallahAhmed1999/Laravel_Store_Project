@extends('Home.home-layout')

@section('content')
    <link rel="stylesheet" href="{{asset('assets/plugins/sweetalert/sweetalert.css')}}">
    <!--================Home Banner Area =================-->
    <section class="banner_area">
        <div class="banner_inner d-flex align-items-center">
            <div class="container">
                <div
                    class="banner_content d-md-flex justify-content-between align-items-center"
                >
                    <div class="mb-3 mb-md-0">
                        <h2>Cart</h2>
                    </div>
                    <div class="page_link">
                        <a href="{{route('home')}}">Home</a>
                        <a href="{{route('cart')}}">Cart</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Home Banner Area =================-->
    <section class="mt-5">
        <div class="container">
            <h3 class="text-uppercase">Cart Products</h3>
        </div>
    </section>
    <!--================Cart Area =================-->
    <section class="cart_area">
        <div class="container">
            <div class="cart_inner">
                <div class="table-responsive">
                    @if(is_null($products) || count($products) < 1)
                        <h3 class="text-uppercase">The Cart is Empty !!!!!!!</h3>
                        <a href="{{route('shop')}}" class="btn btn-success">Go To Shop</a>
                    @else
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col" width="60%">Product</th>
                                <th scope="col">Price</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Total</th>
                                <th scope="col">action</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($products as $product)
                                <tr>
                                    <td>
                                        <div class="media">
                                            <div class="d-flex">
                                                <img src="{{url('images/products').'/'.$product->image}}" width="80px"
                                                     height="80px" alt=""/>
                                            </div>
                                            <div class="media-body">
                                                <p>{{$product->name}}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <h5>${{$product->price}}</h5>
                                    </td>
                                    <td>
                                        <h5>{{$product->quantity}}</h5>
                                    </td>
                                    <td>
                                        <h5>${{$product->price * $product->quantity}}</h5>
                                    </td>
                                    <td>
                                        <form id="cart-delete-product{{$product->id}}"
                                              action="{{route('cart.deleteProduct',$product->id)}}"
                                              method="post" style="display: none;">
                                            @csrf
                                            @method('delete')
                                        </form>
                                        <a href="#" class="btn btn-danger" title="remove {{$product->name}}"
                                           onclick="deleteProduct({{$product->id}})"><i class="fa fa-trash-o"></i></a>
                                    </td>
                                </tr>
                            @endforeach

                            <tr>
                                <td></td>
                                <td></td>
                                <td>
                                    <h5>Total Price</h5>
                                </td>
                                <td>
                                    @php
                                        $counter = 0;
                                        foreach ($products as $product){
                                            $counter += $product->price * $product->quantity;
                                        }
                                    @endphp
                                    <h5>${{$counter}}</h5>
                                </td>
                                <td></td>
                            </tr>

                            <tr class="out_button_area">
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>
                                    <div class="checkout_btn_inner">
                                        <a class="gray_btn" href="{{route('shop')}}">Continue Shopping</a>
                                        <a class="main_btn" onclick="event.preventDefault(); document.getElementById('order_form').submit()" href="#">Proceed to checkout</a>
                                        <form id="order_form" action="{{route('orders.store')}}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </section>
    <!--================End Cart Area =================-->
    <script src="{{asset('assets/plugins/sweetalert/sweetalert.min.js')}}"></script>
    <script>

        function deleteProduct(id) {
            swal({
                title: "Are you sure?",
                text: "You Want to Delete This Product",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, delete it!",
                closeOnConfirm: false
            }, function () {
                document.getElementById('cart-delete-product' + id).submit();
            });
        }
    </script>
@endsection
