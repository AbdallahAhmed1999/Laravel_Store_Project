@extends('control_panel_layout')

@section('title', 'show order')

@section('page_assets')

@endsection

@section('content')
    <div class="block-header">
        <div class="row">
            <div class="col-lg-5 col-md-5 col-sm-12">
                <h2>Orders</h2>
            </div>
            <div class="col-lg-7 col-md-7 col-sm-12 text-right">
                <button class="btn btn-white btn-icon btn-round d-none d-md-inline-block float-right m-l-10"
                        type="button">
                    <i class="zmdi zmdi-plus"></i>
                </button>
                <ul class="breadcrumb float-md-right">
                    <li class="breadcrumb-item"><a href="{{route('home')}}"><i class="zmdi zmdi-home"></i> Oreo</a></li>
                    <li class="breadcrumb-item"><a href="#">Orders</a></li>
                    <li class="breadcrumb-item active">Show Order</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-6 col-md-6">
                <div class="card top_counter">
                    <div class="body">
                        <div class="icon xl-slategray"><i class="zmdi zmdi-account"></i></div>
                        <div class="content">
                            <div class="text">User</div>
                            <h5 class="number">{{$order->user->name}}</h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="card top_counter">
                    <div class="body">
                        <div class="icon xl-slategray"><i class="zmdi zmdi-alarm"></i></div>
                        <div class="content">
                            <div class="text">Order Time</div>
                            <h5 class="number">{{$order->created_at}}</h5>
                        </div>
                    </div>
                </div>
            </div>
            @php
                $total_price = 0;
                foreach ($order->products as $product){
                    $total_price += $product->price * $product->pivot->quantity;
                }
            @endphp
            <div class="col-lg-6 col-md-6">
                <div class="card top_counter">
                    <div class="body">
                        <div class="icon xl-slategray"><i class="zmdi zmdi-money"></i></div>
                        <div class="content">
                            <div class="text">Total Price</div>
                            <h5 class="number">{{$total_price}}</h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="card top_counter">
                    <div class="body">
                        <div class="icon xl-slategray"><i class="zmdi zmdi-alert-circle"></i></div>
                        <div class="content">
                            <div class="text">Order Status</div>
                            <h5 class="number">{{$order->status->name}}</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="tab-content m-t-10">
                    <div class="tab-pane active">
                        <div class="row clearfix">
                            @foreach($order->products as $product)
                                <div class="col-lg-3 col-md-4 col-sm-6">
                                    <div class="card member-card doctor">
                                        <div class="body">
                                            <div class="member-thumb">
                                                <img src="{{url('images/products').'/'.$product->image}}"
                                                     class="img-fluid"
                                                     alt="profile-image">
                                            </div>
                                            <div class="detail">
                                                <h4 class="m-b-0">{{$product->name}}</h4>
                                                <p class="text-muted mt-2">Price: ${{$product->price}}</p>
                                                <p class="text-muted">X {{$product->pivot->quantity}}</p>
                                                <p class="text-muted">
                                                    Subtotal: {{$product->price * $product->pivot->quantity}}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('page_scripts')

@endsection
