@extends('control_panel_layout')

@section('title' , 'Roles')

@section('page_assets')
    <link rel="stylesheet" href="{{asset('assets/plugins/bootstrap-select/css/bootstrap-select.css')}}"/>
    <link rel="stylesheet" href="{{asset('assets/plugins/sweetalert/sweetalert.css')}}">
@endsection

@section('content')
    <div class="block-header">
        <div class="row">
            <div class="col-lg-5 col-md-5 col-sm-12">
                <h2>Roles</h2>
            </div>
            <div class="col-lg-7 col-md-7 col-sm-12 text-right">
                <ul class="breadcrumb float-md-right">
                    <li class="breadcrumb-item"><a href="{{URL('/home')}}"><i class="zmdi zmdi-home"></i> Oreo</a>
                    </li>
                    <li class="breadcrumb-item"><a href="">Roles</a></li>
                    <li class="breadcrumb-item active">All Roles</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <h2>All Roles</h2>
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
                                    <th>Abilities</th>
                                    <th width="15%">action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($roles as $role)
                                    <tr>
                                        <td>{{$role->id}}</td>
                                        <td>{{$role->name}}</td>
                                        <td>
                                            @foreach($role->abilities()->pluck('label') as $ability)
                                                - {{$ability}}<br/>
                                            @endforeach
                                        </td>
                                        <td>
                                            @if($role->name != 'admin')
                                                @can('edit-role')
                                                    <a href="{{route('admin.roles.edit',$role->id)}}"
                                                       title="Edit {{$role->label}}" class="mr-3"><i
                                                            class="fas fa-edit"></i></a>
                                                @endcan

                                                @can('delete-role')
                                                    <form id="delete-role{{$role->id}}"
                                                          action="{{route('admin.roles.destroy',$role->id)}}"
                                                          method="post" style="display: none;">
                                                        @csrf
                                                        @method('delete')
                                                    </form>
                                                    <a href="#"
                                                       title="Delete {{$role->label}}"
                                                       onclick="deleteRole({{$role->id}})"><i
                                                            class="fas fa-trash"></i></a>
                                                @endcan
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
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
        function deleteRole(id) {
            swal({
                title: "Are you sure?",
                text: "You Want to Delete This Role",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, delete it!",
                closeOnConfirm: false
            }, function () {
                document.getElementById('delete-role' + id).submit();
            });
        }
    </script>
@endsection
