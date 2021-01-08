@extends('admin.layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Monitoring Line' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('monitoring_lines.monitoring_line.destroy', $monitoringLine->gid) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('monitoring_lines.monitoring_line.index') }}" class="btn btn-primary" title="{{ trans('monitoring_lines.show_all') }}">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('monitoring_lines.monitoring_line.create') }}" class="btn btn-success" title="{{ trans('monitoring_lines.create') }}">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('monitoring_lines.monitoring_line.edit', $monitoringLine->gid ) }}" class="btn btn-primary" title="{{ trans('monitoring_lines.edit') }}">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="{{ trans('monitoring_lines.delete') }}" onclick="return confirm(&quot;{{ trans('monitoring_lines.confirm_delete') }}?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>{{ trans('monitoring_lines.gid') }}</dt>
            <dd>{{ $monitoringLine->gid }}</dd>
            <dt>{{ trans('monitoring_lines.line_name') }}</dt>
            <dd>{{ $monitoringLine->line_name }}</dd>
            <dt>{{ trans('monitoring_lines.id_network') }}</dt>
            <dd>{{ $monitoringLine->id_network }}</dd>
            <dt>{{ trans('monitoring_lines.geom') }}</dt>
            <dd>{{ $monitoringLine->geom }}</dd>

        </dl>

    </div>
</div>

@endsection