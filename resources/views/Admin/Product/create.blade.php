@extends('control_panel_layout')

@section('title' , 'Add Product')

@section('page_assets')
    <link rel="stylesheet" href="{{asset('assets/plugins/bootstrap-select/css/bootstrap-select.css')}}"/>
    <link rel="stylesheet" href="{{asset('assets/css/image-picker.css')}}">
@endsection

@section('content')
    <div class="block-header">
        <div class="row">
            <div class="col-lg-5 col-md-5 col-sm-12">
                <h2>Products</h2>
            </div>
            <div class="col-lg-7 col-md-7 col-sm-12 text-right">
                <ul class="breadcrumb float-md-right">
                    <li class="breadcrumb-item"><a href="{{URL('/')}}"><i class="zmdi zmdi-home"></i> Oreo</a>
                    </li>
                    <li class="breadcrumb-item"><a href="">Products</a></li>
                    <li class="breadcrumb-item active">Add Product</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            <strong>Add Product</strong>
                            <small>
                                Enter Product Information
                            </small>
                        </h2>
                    </div>
                    <div class="body">

                        @include('admin_errors')

                        <form role="form" action="{{route('admin.products.store')}}" method="post" class="col-sm-12"
                              enctype="multipart/form-data">
                            @csrf
                            <div class="row col-md-3 col-sm-12 float-left">
                                <div class="col-sm-12">
                                    <div class="">
                                        <p>Product image</p>
                                        <div class="img-picker">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3 clearfix col-lg-9 col-sm-12 float-right">
                                <div class="col-md-6 col-sm-12">
                                    <label>Product Name</label>
                                    <div class="input-group @error('name') has-danger @enderror">
                                        <span class="input-group-addon">
                                            <i class="zmdi zmdi-book"></i>
                                        </span>
                                        <input type="text" name="name" class="form-control" placeholder="Name" value="{{ old('name') }}">
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <label>Product Price</label>
                                    <div class="input-group @error('price') has-danger @enderror">
                                        <span class="input-group-addon">
                                            <i class="zmdi zmdi-plus-1"></i>
                                        </span>
                                        <input type="number" step="0.5" name="price" class="form-control"
                                               placeholder="price" value="{{ old('price') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-5 clearfix col-lg-9 col-sm-12 float-right">
                                <div class="col-md-12 col-sm-12 @error('categories') has-danger @enderror">
                                    <label>Product Categories</label>
                                    <select
                                        class="form-control z-index show-tick "
                                        name="categories[]" multiple
                                        data-live-search="true">
                                        <option disabled value="0"></option>
                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row clearfix col-sm-12">
                                <div class="col-sm-12">
                                    <div class="form-group mt-5 @error('description') has-danger @enderror">
                                        <label>Product Description</label>
                                        <textarea name="description" class="form-control" rows="5"
                                                  placeholder="Description">{{ old('description') }}</textarea>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <button type="submit" class="btn btn-primary btn-round float-right">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('page_scripts')
    <script src="{{asset('assets/js/image-picker.js')}}"></script>
    <script>
        $('.has-danger').keypress(function () {
            $(this).removeClass('has-danger');
        });
    </script>
@endsection
