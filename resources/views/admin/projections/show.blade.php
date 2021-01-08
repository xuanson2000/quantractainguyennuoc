@extends('admin.layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Projection' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('projections.projection.destroy', $projection->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('projections.projection.index') }}" class="btn btn-primary" title="{{ trans('projections.show_all') }}">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('projections.projection.create') }}" class="btn btn-success" title="{{ trans('projections.create') }}">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('projections.projection.edit', $projection->id ) }}" class="btn btn-primary" title="{{ trans('projections.edit') }}">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="{{ trans('projections.delete') }}" onclick="return confirm(&quot;{{ trans('projections.confirm_delete') }}?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>{{ trans('projections.srid') }}</dt>
            <dd>{{ $projection->srid }}</dd>
            <dt>{{ trans('projections.proj4_params') }}</dt>
            <dd>{{ $projection->proj4_params }}</dd>
            <dt>{{ trans('projections.extent') }}</dt>
            <dd>{{ $projection->extent }}</dd>
            <dt>{{ trans('projections.created_at') }}</dt>
            <dd>{{ $projection->created_at }}</dd>
            <dt>{{ trans('projections.updated_at') }}</dt>
            <dd>{{ $projection->updated_at }}</dd>

        </dl>

    </div>
</div>

@endsection