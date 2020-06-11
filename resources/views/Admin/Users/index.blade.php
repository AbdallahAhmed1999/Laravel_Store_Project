@extends('control_panel_layout')

@section('title' , 'Users')

@section('page_assets')
    <link rel="stylesheet" href="{{asset('assets/plugins/sweetalert/sweetalert.css')}}">
@endsection

@section('content')
    <div class="block-header">
        <div class="row">
            <div class="col-lg-5 col-md-5 col-sm-12">
                <h2>Users</h2>
            </div>
            <div class="col-lg-7 col-md-7 col-sm-12 text-right">
                <ul class="breadcrumb float-md-right">
                    <li class="breadcrumb-item"><a href="{{URL('/home')}}"><i class="zmdi zmdi-home"></i> Oreo</a>
                    </li>
                    <li class="breadcrumb-item"><a href="">Users</a></li>
                    <li class="breadcrumb-item active">All Users</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <h2><strong>All Users</strong></h2>
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
                                    <th>Email</th>
                                    <th>Roles</th>
                                    <th width="20%">action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td>
                                            <span class="list-icon">
                                                <img src="/images/users/{{$user->image}}" class="patients-img"
                                                     width="60rem"
                                                     height="80rem">
                                            </span>
                                        </td>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>
                                            @foreach($user->roles as $role)
                                                - {{$role->name}}<br/>
                                            @endforeach
                                        </td>
                                        <td>
                                            @if($user->id != 1)
                                                @can('edit-user-roles')
                                                    <a href="{{route('admin.users.edit',$user->id)}}"
                                                       title="Edit {{$user->name}} Roles" class="mr-3"><i
                                                            class="fas fa-edit"></i></a>
                                                @endcan

                                                @can('delete-user')
                                                    <form id="delete-user{{$user->id}}"
                                                          action="{{route('admin.users.destroy',$user->id)}}"
                                                          method="post" style="display: none;">
                                                        @csrf
                                                        @method('delete')
                                                    </form>
                                                    <a href="#"
                                                       title="Delete {{$user->name}}"
                                                       onclick="deleteUser({{$user->id}})"><i
                                                            class="fas fa-trash"></i></a>
                                                @endcan
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="float-right">{{$users->onEachSide(2)->links()}}</div>
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
        function deleteUser(id) {
            swal({
                title: "Are you sure?",
                text: "You Want to Delete This User",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, delete it!",
                closeOnConfirm: false
            }, function () {
                document.getElementById('delete-user' + id).submit();
            });
        }
    </script>
@endsection
