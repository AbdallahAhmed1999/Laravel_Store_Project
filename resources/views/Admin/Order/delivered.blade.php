@extends('control_panel_layout')

@section('title' , 'Delivered Orders')

@section('page_assets')
@endsection

@section('content')
    <div class="block-header">
        <div class="row">
            <div class="col-lg-5 col-md-5 col-sm-12">
                <h2>Orders</h2>
            </div>
            <div class="col-lg-7 col-md-7 col-sm-12 text-right">
                <ul class="breadcrumb float-md-right">
                    <li class="breadcrumb-item"><a href="{{URL('/home')}}"><i class="zmdi zmdi-home"></i> Oreo</a>
                    </li>
                    <li class="breadcrumb-item"><a href="">Orders</a></li>
                    <li class="breadcrumb-item active">Delivered Orders</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <h2><strong>Delivered Orders</strong></h2>
                    </div>
                    <div class="body">
                        <div class="row">
                            <div class="col-md-8 col-sm-12">
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Order Time</th>
                                    <th>User</th>
                                    <th width="20%">action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($orders as $order)
                                    <tr>
                                        <td>
                                            {{$order->id}}
                                        </td>
                                        <td>{{$order->created_at}}</td>
                                        <td>{{$order->user->name}}</td>
                                        <td>
                                            @can('show-single-order')
                                                <a href="{{route('admin.orders.show',$order->id)}}"
                                                   title="Show Order" class="mr-3 ml-4"><i
                                                        class="fas fa-eye"></i></a>
                                            @endcan
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="float-right">{{$orders->onEachSide(2)->links()}}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('page_scripts')

@endsection
