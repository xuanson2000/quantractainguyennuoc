@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Surfacewater Station' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('surfacewater_stations.surfacewater_station.destroy', $surfacewaterStation->gid) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('surfacewater_stations.surfacewater_station.index') }}" class="btn btn-primary" title="{{ trans('surfacewater_stations.show_all') }}">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('surfacewater_stations.surfacewater_station.create') }}" class="btn btn-success" title="{{ trans('surfacewater_stations.create') }}">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('surfacewater_stations.surfacewater_station.edit', $surfacewaterStation->gid ) }}" class="btn btn-primary" title="{{ trans('surfacewater_stations.edit') }}">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="{{ trans('surfacewater_stations.delete') }}" onclick="return confirm(&quot;{{ trans('surfacewater_stations.confirm_delete') }}?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>{{ trans('surfacewater_stations.gid') }}</dt>
            <dd>{{ $surfacewaterStation->gid }}</dd>
            <dt>{{ trans('surfacewater_stations.matram') }}</dt>
            <dd>{{ $surfacewaterStation->matram }}</dd>
            <dt>{{ trans('surfacewater_stations.tentram') }}</dt>
            <dd>{{ $surfacewaterStation->tentram }}</dd>
            <dt>{{ trans('surfacewater_stations.tensong') }}</dt>
            <dd>{{ $surfacewaterStation->tensong }}</dd>
            <dt>{{ trans('surfacewater_stations.luuvucsong') }}</dt>
            <dd>{{ $surfacewaterStation->luuvucsong }}</dd>
            <dt>{{ trans('surfacewater_stations.xa') }}</dt>
            <dd>{{ $surfacewaterStation->xa }}</dd>
            <dt>{{ trans('surfacewater_stations.huyen') }}</dt>
            <dd>{{ $surfacewaterStation->huyen }}</dd>
            <dt>{{ trans('surfacewater_stations.tinh') }}</dt>
            <dd>{{ $surfacewaterStation->tinh }}</dd>
            <dt>{{ trans('surfacewater_stations.toadox') }}</dt>
            <dd>{{ $surfacewaterStation->toadox }}</dd>
            <dt>{{ trans('surfacewater_stations.toadoy') }}</dt>
            <dd>{{ $surfacewaterStation->toadoy }}</dd>
            <dt>{{ trans('surfacewater_stations.dientichtn') }}</dt>
            <dd>{{ $surfacewaterStation->dientichtn }}</dd>
            <dt>{{ trans('surfacewater_stations.thongsoqt') }}</dt>
            <dd>{{ $surfacewaterStation->thongsoqt }}</dd>
            <dt>{{ trans('surfacewater_stations.geom') }}</dt>
            <dd>{{ $surfacewaterStation->geom }}</dd>
            <dt>{{ trans('surfacewater_stations.ngayqt') }}</dt>
            <dd>{{ $surfacewaterStation->ngayqt }}</dd>
            <dt>{{ trans('surfacewater_stations.capquanly') }}</dt>
            <dd>{{ $surfacewaterStation->capquanly }}</dd>
            <dt>{{ trans('surfacewater_stations.mota') }}</dt>
            <dd>{{ $surfacewaterStation->mota }}</dd>
            <dt>{{ trans('surfacewater_stations.docaoz') }}</dt>
            <dd>{{ ($surfacewaterStation->docaoz) ? 'Yes' : 'No' }}</dd>

        </dl>

    </div>
</div>

@endsection