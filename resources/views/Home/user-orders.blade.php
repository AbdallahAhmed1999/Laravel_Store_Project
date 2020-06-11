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
                        <h2>{{auth()->user()->name}} Orders</h2>
                    </div>
                    <div class="page_link">
                        <a href="{{route('home')}}">Home</a>
                        <a href="{{route('orders')}}">Orders</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Home Banner Area =================-->

    <!--================Checkout Area =================-->
    <section class="checkout_area section_gap">
        <div class="container">
            <div class="billing_details">
                <div class="row">
                    @forelse($orders as $order)
                        <div class="col-lg-4 mt-5">
                            <div class="order_box">
                                <h2>Order Date: <span class="text-success">{{$order->created_at}}</span></h2>
                                <form action="{{route('orders.cancel',$order->id)}}" id="cancelOrder" method="POST"
                                      style="display: none;">
                                    @csrf
                                    @method('delete')
                                </form>
                                <ul class="list list_2">
                                    <li>
                                        <button
                                            class="btn btn-danger mt-1"
                                            onclick="event.preventDefault(); document.getElementById('cancelOrder').submit()">
                                            Cancel Order
                                        </button>
                                        <hr>
                                    </li>
                                </ul>

                                <ul class="list">
                                    <li>
                                        <a href="#">Product<span>Total</span>
                                        </a>
                                    </li>
                                    @php
                                        $total = 0;
                                    @endphp
                                    @foreach($order->products as $product)
                                        <li>
                                            <a href="#">{{$product->name}}
                                                <span class="middle">x {{$product->pivot->quantity}}</span>
                                                <span class="last">${{$product->price}}</span>
                                            </a>
                                        </li>
                                        @php
                                            $total += $product->pivot->quantity * $product->price;
                                        @endphp
                                    @endforeach
                                </ul>
                                <ul class="list list_2">
                                    <li>
                                        <a href="#"
                                        >Total
                                            <span>${{$total}}</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            Status<span
                                                class="genric-btn primary circle small mt-2">{{$order->status->name}}</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    @empty
                        <div class="row col-sm-12">
                            <h3>You Have No Orders !!</h3>
                        </div>
                        <div class="row col-sm-12">
                            <div class="button-group-area">
                                <a href="{{route('shop')}}" class="btn btn-success">Go To Shop</a>
                            </div>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </section>
    <!--================End Checkout Area =================-->
@endsection
