@extends('control_panel_layout')

@section('title','Dashboard')

@section('page_assets')



@endsection



@section('content')

    <div class="block-header">
        <div class="row">
            <div class="col-lg-5 col-md-5 col-sm-12">
                <h2>Dashboard
                    <small>Welcome to Oreo</small>
                </h2>
            </div>
            <div class="col-lg-7 col-md-7 col-sm-12 text-right">
                <ul class="breadcrumb float-md-right">
                    <li class="breadcrumb-item"><a href="{{URL('/')}}"><i class="zmdi zmdi-home"></i> Oreo</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card">
                    <ul class="row profile_state list-unstyled">
                        <li class="col-lg-3 col-md-3 col-6">
                            <div class="body">
                                <i class="zmdi zmdi-collection-item text-success"></i>
                                <h4>{{$counts->products}}</h4>
                                <span>{{ ($counts->products > 1) ? 'Products' : 'Product'}}</span>
                            </div>
                        </li>
                        <li class="col-lg-3 col-md-3 col-6">
                            <div class="body">
                                <i class="fas fa-shopping-cart text-info"></i>
                                <h4>{{$counts->orders}}</h4>
                                <span>{{ ($counts->orders) ? 'Orders' : 'Order'}}</span>
                            </div>
                        </li>
                        <li class="col-lg-3 col-md-3 col-6">
                            <div class="body">
                                <i class="fas fa-briefcase text-danger"></i>
                                <h4>{{$counts->categories}}</h4>
                                <span>{{ ($counts->categories > 1) ? 'Categories' : 'Category'}}</span>
                            </div>
                        </li>
                        <li class="col-lg-3 col-md-3 col-6">
                            <div class="body">
                                <i class="fas fa-user-cog text-warning"></i>
                                <h4>{{$counts->users}}</h4>
                                <span>{{ ($counts->users > 1) ? 'Users' : 'User'}}</span>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection





@section('page_scripts')



@endsection
