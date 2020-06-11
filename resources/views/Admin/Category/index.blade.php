@extends('control_panel_layout')

@section('title' , 'Categories')

@section('page_assets')
    <link rel="stylesheet" href="{{asset('assets/plugins/sweetalert/sweetalert.css')}}">
@endsection

@section('content')
    <div class="block-header">
        <div class="row">
            <div class="col-lg-5 col-md-5 col-sm-12">
                <h2>Categories</h2>
            </div>
            <div class="col-lg-7 col-md-7 col-sm-12 text-right">
                <ul class="breadcrumb float-md-right">
                    <li class="breadcrumb-item"><a href="{{URL('/home')}}"><i class="zmdi zmdi-home"></i> Oreo</a>
                    </li>
                    <li class="breadcrumb-item"><a href="">Categories</a></li>
                    <li class="breadcrumb-item active">All Categories</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        @can('add-category')
            <div class="row clearfix">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="header">
                            <h2><strong>Add Category</strong></h2>
                            <ul class="header-dropdown">
                                <li class="remove">
                                    <a role="button" style="cursor: pointer;" class="boxs-close"><i
                                            class="zmdi zmdi-close"></i></a>
                                </li>
                            </ul>
                        </div>
                        <div class="body">

                            @include('admin_errors')

                            <form action="{{route('admin.categories.store')}}" method="POST">
                                @csrf
                                <div class="row clearfix">
                                    <div class="col-sm-12">
                                        <div class="form-group @error('name') has-danger @enderror">
                                            <input type="text" name="name" class="form-control"
                                                   placeholder="Category Name" value="{{old('name')}}">
                                        </div>
                                        <div class="form-group mt-3 @error('description') has-danger @enderror">
                                            <textarea name="description" class="form-control" rows="2"
                                                      placeholder="Category Description">{{ old('description') }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <button type="submit" class="btn btn-primary btn-round float-right">Submit
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        @endcan

        <div class="row clearfix">
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <h2>All Categories</h2>
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
                                    <th width="5%">#</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th width="15%">action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($categories as $category)
                                    <tr>
                                        <td>{{$category->id}}</td>
                                        <td>{{$category->name}}</td>
                                        <td>{{$category->description}}</td>
                                        <td>
                                            @can('edit-category')
                                                <a href="#"
                                                   onclick="editCategory({{$category}})"
                                                   title="Edit {{$category->name}}" class="mr-3"><i
                                                        class="fas fa-edit"></i></a>
                                            @endcan

                                            @can('delete-category')
                                                <form id="delete-category{{$category->id}}"
                                                      action="{{route('admin.categories.destroy',$category->id)}}"
                                                      method="post" style="display: none;">
                                                    @csrf
                                                    @method('delete')
                                                </form>
                                                <a href="#"
                                                   title="Delete {{$category->name}}"
                                                   onclick="deleteCategory({{$category->id}})"><i
                                                        class="fas fa-trash"></i></a>
                                            @endcan
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="float-right">{{$categories->onEachSide(2)->links()}}</div>
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
        $('.has-danger').keypress(function () {
            $(this).removeClass('has-danger');
        });
    </script>
    <script>
        function editCategory(category) {
            swal({
                title: "Edit Category " + category.name + " !",
                text: "Enter New Name :",
                type: "input",
                showCancelButton: true,
                closeOnConfirm: false,
                animation: "slide-from-top",
                inputPlaceholder: "Category Name"
            }, function (inputValue) {
                if (inputValue === false) return false;
                if (inputValue === "") {
                    swal.showInputError("You need to write something!");
                    return false
                }
                if (inputValue.length < 3) {
                    swal.showInputError("The Name length must be Grater than 3 characters !");
                    return false
                }
                const name = inputValue;
                swal({
                    title: "Edit Category " + category.name + " !",
                    text: "Enter New Description :",
                    type: "input",
                    showCancelButton: true,
                    closeOnConfirm: false,
                    animation: "slide-from-top",
                    inputPlaceholder: "Category Description"
                }, function (inputValue2) {
                    if (inputValue2 === false) return false;
                    if (inputValue2 === "") {
                        swal.showInputError("You need to write something!");
                        return false
                    }
                    if (inputValue2.length < 10 || inputValue2.length > 30) {
                        swal.showInputError("The Description length must be between 10 and 30 characters !");
                        return false
                    }
                    const description = inputValue2;
                    $.ajax({
                        url: "{{URL('admin/categories')}}" + "/" + category.id,
                        method: "PUT",
                        data: {
                            '_token': '{{csrf_token()}}',
                            '_method': 'PUT',
                            'name': name,
                            'description': description
                        },
                        success: function (data) {
                            if (data['status']) {
                                swal("Updated !", data['success'], "success");
                                setTimeout(function () {
                                    location.reload()
                                }, 3000);
                            } else {
                                swal("Not Updated!", "The Category does not updated.", "error");
                            }
                        },
                        failed: function (data) {
                            swal("Not Updated!", "The Category does not updated.", "error");
                        },
                        error: function (data) {
                            console.log(data);
                        }
                    });
                });
            });
        }

        function deleteCategory(id) {
            swal({
                title: "Are you sure?",
                text: "You Want to Delete This Category",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, delete it!",
                closeOnConfirm: false
            }, function () {
                document.getElementById('delete-category' + id).submit();
            });
        }
    </script>
@endsection
