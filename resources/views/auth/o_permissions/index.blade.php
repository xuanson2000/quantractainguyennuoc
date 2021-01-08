@extends('layouts.app')

@section('content')

    @if(Session::has('success_message'))
        <div class="alert alert-success alert-dismissible fade show">
            <span class="glyphicon glyphicon-ok"></span>
            {!! session('success_message') !!}

            <button type="button" class="close" data-dismiss="alert" aria-label="close">
                <span aria-hidden="true">&times;</span>
            </button>

        </div>
    @endif
    <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card m-b-30">
                        <div class="card-header">
                            <h4 class="pull-left mb-0">{{ trans('permissions.model_plural') }}</h4>
                            <h4 class="pull-right mt-0 mb-0">
                                <a class="btn btn-success waves-effect waves-light pull-right" href="{{ route('permissions.permission.create') }}" class="btn btn-success" title="{{ trans('permissions.create') }}">
                                    <i class="fa fa-plus" aria-hidden="true"></i> {{ trans('permissions.create') }}
                                 </a>
                            </h4>
                        </div>
                        @if(count($permissions) == 0)
                            <div class="card-body">
                                 <h4>{{ trans('permissions.none_available') }}</h4>
                            </div>
                        @else
                            <div class="card-body">
                                <table class="table">
                                    <thead class="thead-default">
                                        <tr>
                                                                        <th>{{ trans('permissions.name') }}</th>
                            <th>{{ trans('permissions.guard_name') }}</th>

                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($permissions as $permission)
                                        <tr>
                                                                        <td>{{ $permission->name }}</td>
                            <td>{{ $permission->guard_name }}</td>

                                             <td>
                                                 <form method="POST" action="{!! route('permissions.permission.destroy', $permission->id) !!}" accept-charset="UTF-8">
                                                     <input name="_method" value="DELETE" type="hidden">
                                                     {{ csrf_field() }}
                                                      <div class="btn-group btn-group-xs pull-right" role="group">
                                                           <a href="{{ route('permissions.permission.show', $permission->id ) }}" class="btn btn-info" title="{{ trans('permissions.show') }}">
                                                                <i class="fa fa-eye" aria-hidden="true"></i>
                                                           </a>
                                                           <a href="{{ route('permissions.permission.edit', $permission->id ) }}" class="btn btn-primary" title="{{ trans('permissions.edit') }}">
                                                                <i class="fa fa-edit" aria-hidden="true"></i>
                                                           </a>

                                                           <button type="submit" class="btn btn-danger" title="{{ trans('permissions.delete') }}" onclick="return confirm(&quot;{{ trans('permissions.confirm_delete') }}&quot;)">
                                                                <i class="fa fa-trash-o" aria-hidden="true"></i>
                                                           </button>
                                                      </div>

                                                 </form>

                                             </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="card-footer">
                                {!! $permissions->render() !!}
                            </div>
                         @endif
                    </div>
                </div>
            </div>
    </div>
@endsection

