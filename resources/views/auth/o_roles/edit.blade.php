@extends('layouts.app')

@section('content')
    <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card m-b-30">
                            <div class="card-header">
                                <h4 class="pull-left mb-0">{{ !empty($role->name) ? $role->name : 'Role' }}</h4>
                                <div class="btn-group  mt-0 mb-0 pull-right" role="group">
                                    <a href="{{ route('roles.role.index') }}" class="btn btn-primary waves-effect waves-light" title="{{ trans('roles.show_all') }}">
                                        <i class="fa fa-list" aria-hidden="true"></i> {{ trans('roles.show_all') }}
                                    </a>
                                    <a href="{{ route('roles.role.create') }}" class="btn btn-success waves-effect waves-light" title="{{ trans('roles.create') }}">
                                        <i class="fa fa-plus" aria-hidden="true"></i> {{ trans('roles.create') }}
                                    </a>
                                </div>
                            </div>
                            <div class="card-body">
                                @if ($errors->any())
                                <ul class="alert alert-danger">
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                                @endif
                                <ul class="nav nav-tabs" role="role-properties">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="tab" href="#role-general-info" role="tab">{{ trans('roles.general_info') }}</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#role-permissions" role="tab">{{ trans('roles.role_permissions') }}</a>
                                    </li>
                                </ul>
                                    <div class="tab-content">
                                        <div id="role-general-info" class="tab-pane active p-3" role="tabpanel">
                                            <form method="POST" action="{{ route('roles.role.update', $role->id) }}" id="edit_role_form" name="edit_role_form" accept-charset="UTF-8" class="form-horizontal">
                                                {{ csrf_field() }}
                                                <input name="_method" type="hidden" value="PUT">
                                                @include ('roles.form', ['role' => $role,])

                                                <div class="form-group">
                                                    <div class="col-md-offset-2 col-md-10">
                                                        <input class="btn btn-primary" type="submit" value="{{ trans('roles.update_general_info') }}">
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div id="role-permissions" class="tab-pane p-3" role="tabpanel">
                                            <form method="POST" action="{{ route('roles.role.update_permissions', $role->id) }}" id="edit_role_permissions_form" name="edit_role_permissions_form" accept-charset="UTF-8" class="form-horizontal">
                                                {{ csrf_field() }}
                                                <input name="_method" type="hidden" value="PUT">
                                                @include ('roles.permissions_form', ['role' => $role,'permissions' => $permissions])

                                                <div class="form-group">
                                                    <div class="col-md-offset-2 col-md-10">
                                                        <input class="btn btn-primary" type="submit" value="{{ trans('roles.update_permissions') }}">
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
@endsection