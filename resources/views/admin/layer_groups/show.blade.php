@extends('admin.layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Layer Group' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('layer_groups.layer_group.destroy', $layerGroup->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('layer_groups.layer_group.index') }}" class="btn btn-primary" title="{{ trans('layer_groups.show_all') }}">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('layer_groups.layer_group.create') }}" class="btn btn-success" title="{{ trans('layer_groups.create') }}">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('layer_groups.layer_group.edit', $layerGroup->id ) }}" class="btn btn-primary" title="{{ trans('layer_groups.edit') }}">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="{{ trans('layer_groups.delete') }}" onclick="return confirm(&quot;{{ trans('layer_groups.confirm_delete') }}?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>{{ trans('layer_groups.map_id') }}</dt>
            <dd>{{ optional($layerGroup->map)->map_name }}</dd>
            <dt>{{ trans('layer_groups.group_name') }}</dt>
            <dd>{{ $layerGroup->group_name }}</dd>
            <dt>{{ trans('layer_groups.description') }}</dt>
            <dd>{{ $layerGroup->description }}</dd>
            <dt>{{ trans('layer_groups.created_at') }}</dt>
            <dd>{{ $layerGroup->created_at }}</dd>
            <dt>{{ trans('layer_groups.updated_at') }}</dt>
            <dd>{{ $layerGroup->updated_at }}</dd>
            <dt>{{ trans('layer_groups.delete_at') }}</dt>
            <dd>{{ $layerGroup->delete_at }}</dd>

        </dl>

    </div>
</div>

@endsection