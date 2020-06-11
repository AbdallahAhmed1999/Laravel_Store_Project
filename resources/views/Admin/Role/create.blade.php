@extends('control_panel_layout')

@section('title' , 'Add Role')

@section('page_assets')
    <link rel="stylesheet" href="{{asset('assets/plugins/bootstrap-select/css/bootstrap-select.css')}}"/>
@endsection

@section('content')
    <div class="block-header">
        <div class="row">
            <div class="col-lg-5 col-md-5 col-sm-12">
                <h2>Roles</h2>
            </div>
            <div class="col-lg-7 col-md-7 col-sm-12 text-right">
                <ul class="breadcrumb float-md-right">
                    <li class="breadcrumb-item"><a href="{{URL('/')}}"><i class="zmdi zmdi-home"></i> Oreo</a>
                    </li>
                    <li class="breadcrumb-item"><a href="">Roles</a></li>
                    <li class="breadcrumb-item active">Add Role</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-sm-12">
                <div class="card">
                    <div class="header">
                        <h2><strong>Add Role</strong></h2>
                        {{--                        <ul class="header-dropdown">--}}
                        {{--                            <li class="remove">--}}
                        {{--                                <a role="button" style="cursor: pointer;" class="boxs-close"><i--}}
                        {{--                                        class="zmdi zmdi-close"></i></a>--}}
                        {{--                            </li>--}}
                        {{--                        </ul>--}}
                    </div>
                    <div class="body">

                        @include('admin_errors')

                        <form action="{{route('admin.roles.store')}}" method="POST">
                            @csrf
                            <div class="row clearfix col-sm-12">
                                <div class="col-sm-6">
                                    <div class="form-group @error('name') has-danger @enderror">
                                        <label>Role Name</label>
                                        <input type="text" name="name" class="form-control"
                                               placeholder="Name" value="{{old('name')}}">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group @error('abilities') has-danger @enderror">
                                        <label>Role Abilities</label>
                                        <select
                                            class="form-control z-index show-tick "
                                            name="abilities[]" multiple
                                            data-live-search="true">
                                            <option disabled value="0"></option>
                                            @foreach($abilities as $ability)
                                                <option value="{{$ability->id}}">{{$ability->label}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-primary btn-round float-right">Submit
                                </button>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    </div>
@endsection

@section('page_scripts')
    <script>
        $('.has-danger').keypress(function () {
            $(this).removeClass('has-danger');
        });
    </script>
@endsection
