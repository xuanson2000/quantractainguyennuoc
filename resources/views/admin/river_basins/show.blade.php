@extends('admin.layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'River Basin' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('basins.basin.destroy', $riverBasin->gid) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('basins.basin.index') }}" class="btn btn-primary" title="{{ trans('river_basins.show_all') }}">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('basins.basin.create') }}" class="btn btn-success" title="{{ trans('river_basins.create') }}">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('basins.basin.edit', $riverBasin->gid ) }}" class="btn btn-primary" title="{{ trans('river_basins.edit') }}">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="{{ trans('river_basins.delete') }}" onclick="return confirm(&quot;{{ trans('river_basins.confirm_delete') }}?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>{{ trans('river_basins.gid') }}</dt>
            <dd>{{ $riverBasin->gid }}</dd>
            <dt>{{ trans('river_basins.name_o') }}</dt>
            <dd>{{ $riverBasin->name_o }}</dd>
            <dt>{{ trans('river_basins.basin_name') }}</dt>
            <dd>{{ $riverBasin->basin_name }}</dd>
            <dt>{{ trans('river_basins.geom') }}</dt>
            <dd>{{ $riverBasin->geom }}</dd>

        </dl>

    </div>
</div>

@endsection