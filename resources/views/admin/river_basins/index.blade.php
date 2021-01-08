@extends('admin.layouts.app')

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
                            <h4 class="pull-left mb-0">{{ trans('river_basins.model_plural') }}</h4>
                            <h4 class="pull-right mt-0 mb-0">
                                <a class="btn btn-success waves-effect waves-light pull-right" href="{{ route('basins.basin.create') }}" class="btn btn-success" title="{{ trans('river_basins.create') }}">
                                    <i class="fa fa-plus" aria-hidden="true"></i> {{ trans('river_basins.create') }}
                                 </a>
                            </h4>
                        </div>
                        @if(count($riverBasins) == 0)
                            <div class="card-body">
                                 <h4>{{ trans('river_basins.none_available') }}</h4>
                            </div>
                        @else
                            <div class="card-body">
                                <table class="table">
                                    <thead class="thead-default">
                                        <tr>
                                                                        <th>{{ trans('river_basins.gid') }}</th>
                            <th>{{ trans('river_basins.name_o') }}</th>
                            <th>{{ trans('river_basins.basin_name') }}</th>
                            <th>{{ trans('river_basins.geom') }}</th>

                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($riverBasins as $riverBasin)
                                        <tr>
                                                                        <td>{{ $riverBasin->gid }}</td>
                            <td>{{ $riverBasin->name_o }}</td>
                            <td>{{ $riverBasin->basin_name }}</td>
                            <td>{{ $riverBasin->geom }}</td>

                                             <td>
                                                 <form method="POST" action="{!! route('basins.basin.destroy', $riverBasin->gid) !!}" accept-charset="UTF-8">
                                                     <input name="_method" value="DELETE" type="hidden">
                                                     {{ csrf_field() }}
                                                      <div class="btn-group btn-group-xs pull-right" role="group">
                                                           <a href="{{ route('basins.basin.show', $riverBasin->gid ) }}" class="btn btn-info" title="{{ trans('river_basins.show') }}">
                                                                <i class="fa fa-eye" aria-hidden="true"></i>
                                                           </a>
                                                           <a href="{{ route('basins.basin.edit', $riverBasin->gid ) }}" class="btn btn-primary" title="{{ trans('river_basins.edit') }}">
                                                                <i class="fa fa-edit" aria-hidden="true"></i>
                                                           </a>

                                                           <button type="submit" class="btn btn-danger" title="{{ trans('river_basins.delete') }}" onclick="return confirm(&quot;{{ trans('river_basins.confirm_delete') }}&quot;)">
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
                                {!! $riverBasins->render() !!}
                            </div>
                         @endif
                    </div>
                </div>
            </div>
    </div>
@endsection

