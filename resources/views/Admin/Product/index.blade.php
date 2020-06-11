@extends('control_panel_layout')

@section('title' , 'Products')

@section('page_assets')
    <link rel="stylesheet" href="{{asset('assets/plugins/sweetalert/sweetalert.css')}}">
@endsection

@section('content')
    <div class="block-header">
        <div class="row">
            <div class="col-lg-5 col-md-5 col-sm-12">
                <h2>Products</h2>
            </div>
            <div class="col-lg-7 col-md-7 col-sm-12 text-right">
                <ul class="breadcrumb float-md-right">
                    <li class="breadcrumb-item"><a href="{{URL('/home')}}"><i class="zmdi zmdi-home"></i> Oreo</a>
                    </li>
                    <li class="breadcrumb-item"><a href="">Products</a></li>
                    <li class="breadcrumb-item active">All Product</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <h2>All Products</h2>
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
                                    <th width="10%">Image</th>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Category</th>
                                    <th width="20%">action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($products as $product)
                                    <tr>
                                        <td>
                                            <span class="list-icon">
                                                <img src="/images/products/{{$product->image}}" class="patients-img"
                                                     width="60rem"
                                                     height="80rem">
                                            </span>
                                        </td>
                                        <td>{{$product->name}}</td>
                                        <td>{{$product->price}}</td>
                                        <td>
                                            @foreach($product->categories()->pluck('name') as $category)
                                                - {{$category}}<br/>
                                            @endforeach
                                        </td>
                                        <td>
                                            <a href="{{route('product.show',$product->id)}}"
                                               title="Show {{$product->name}}" class="mr-3 ml-4"><i
                                                    class="fas fa-eye"></i></a>

                                            @can('edit-product')
                                                <a href="{{route('admin.products.edit',$product->id)}}"
                                                   title="Edit {{$product->name}}" class="mr-3"><i
                                                        class="fas fa-edit"></i></a>
                                            @endcan

                                            @can('delete-product')
                                                <form id="delete-product{{$product->id}}"
                                                      action="{{route('admin.products.destroy',$product->id)}}"
                                                      method="post" style="display: none;">
                                                    @csrf
                                                    @method('delete')
                                                </form>
                                                <a href="#"
                                                   title="Delete {{$product->name}}"
                                                   onclick="deleteProduct({{$product->id}})"><i
                                                        class="fas fa-trash"></i></a>
                                            @endcan

                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="float-right">{{$products->onEachSide(2)->links()}}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('page_scripts')
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
                document.getElementById('delete-product' + id).submit();
            });
        }
    </script>
@endsection
