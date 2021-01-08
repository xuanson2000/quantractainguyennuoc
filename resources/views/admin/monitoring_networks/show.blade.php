@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Monitoring Network' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('networks.network.destroy', $monitoringNetwork->gid) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('networks.network.index') }}" class="btn btn-primary" title="{{ trans('monitoring_networks.show_all') }}">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('networks.network.create') }}" class="btn btn-success" title="{{ trans('monitoring_networks.create') }}">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('networks.network.edit', $monitoringNetwork->gid ) }}" class="btn btn-primary" title="{{ trans('monitoring_networks.edit') }}">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="{{ trans('monitoring_networks.delete') }}" onclick="return confirm(&quot;{{ trans('monitoring_networks.confirm_delete') }}?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>{{ trans('monitoring_networks.gid') }}</dt>
            <dd>{{ $monitoringNetwork->gid }}</dd>
            <dt>{{ trans('monitoring_networks.network_name') }}</dt>
            <dd>{{ $monitoringNetwork->network_name }}</dd>
            <dt>{{ trans('monitoring_networks.network_code') }}</dt>
            <dd>{{ $monitoringNetwork->network_code }}</dd>
            <dt>{{ trans('monitoring_networks.geom') }}</dt>
            <dd>{{ $monitoringNetwork->geom }}</dd>

        </dl>

    </div>
</div>

@endsection