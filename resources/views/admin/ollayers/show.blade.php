@extends('admin.layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Ollayer' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('ollayers.ollayer.destroy', $ollayer->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('ollayers.ollayer.index') }}" class="btn btn-primary" title="{{ trans('ollayers.show_all') }}">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('ollayers.ollayer.create') }}" class="btn btn-success" title="{{ trans('ollayers.create') }}">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('ollayers.ollayer.edit', $ollayer->id ) }}" class="btn btn-primary" title="{{ trans('ollayers.edit') }}">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="{{ trans('ollayers.delete') }}" onclick="return confirm(&quot;{{ trans('ollayers.confirm_delete') }}?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>{{ trans('ollayers.map_id') }}</dt>
            <dd>{{ optional($ollayer->map_id)->map_name }}</dd>
            <dt>{{ trans('ollayers.group_id') }}</dt>
            <dd>{{ optional($ollayer->group_id)->group_name }}</dd>
            <dt>{{ trans('ollayers.layer_name') }}</dt>
            <dd>{{ $ollayer->layer_name }}</dd>
            <dt>{{ trans('ollayers.layer_title') }}</dt>
            <dd>{{ $ollayer->layer_title }}</dd>
            <dt>{{ trans('ollayers.description') }}</dt>
            <dd>{{ $ollayer->description }}</dd>
            <dt>{{ trans('ollayers.opacity') }}</dt>
            <dd>{{ $ollayer->opacity }}</dd>
            <dt>{{ trans('ollayers.source') }}</dt>
            <dd>{{ $ollayer->source }}</dd>
            <dt>{{ trans('ollayers.visible') }}</dt>
            <dd>{{ ($ollayer->visible) ? 'Yes' : 'No' }}</dd>
            <dt>{{ trans('ollayers.minxextent') }}</dt>
            <dd>{{ $ollayer->minxextent }}</dd>
            <dt>{{ trans('ollayers.minyextent') }}</dt>
            <dd>{{ $ollayer->minyextent }}</dd>
            <dt>{{ trans('ollayers.maxxextent') }}</dt>
            <dd>{{ $ollayer->maxxextent }}</dd>
            <dt>{{ trans('ollayers.maxyextent') }}</dt>
            <dd>{{ $ollayer->maxyextent }}</dd>
            <dt>{{ trans('ollayers.zindex') }}</dt>
            <dd>{{ $ollayer->zindex }}</dd>
            <dt>{{ trans('ollayers.minresolution') }}</dt>
            <dd>{{ $ollayer->minresolution }}</dd>
            <dt>{{ trans('ollayers.maxresolution') }}</dt>
            <dd>{{ $ollayer->maxresolution }}</dd>
            <dt>{{ trans('ollayers.created_at') }}</dt>
            <dd>{{ $ollayer->created_at }}</dd>
            <dt>{{ trans('ollayers.updated_at') }}</dt>
            <dd>{{ $ollayer->updated_at }}</dd>
            <dt>{{ trans('ollayers.delete_at') }}</dt>
            <dd>{{ $ollayer->delete_at }}</dd>

        </dl>

    </div>
</div>

@endsection