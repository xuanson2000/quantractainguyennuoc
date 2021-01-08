@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Tramdomua' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('tramdomuas.tramdomua.destroy', $tramdomua->gid) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('tramdomuas.tramdomua.index') }}" class="btn btn-primary" title="{{ trans('tramdomuas.show_all') }}">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('tramdomuas.tramdomua.create') }}" class="btn btn-success" title="{{ trans('tramdomuas.create') }}">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('tramdomuas.tramdomua.edit', $tramdomua->gid ) }}" class="btn btn-primary" title="{{ trans('tramdomuas.edit') }}">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="{{ trans('tramdomuas.delete') }}" onclick="return confirm(&quot;{{ trans('tramdomuas.confirm_delete') }}?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>{{ trans('tramdomuas.gid') }}</dt>
            <dd>{{ $tramdomua->gid }}</dd>
            <dt>{{ trans('tramdomuas.tt') }}</dt>
            <dd>{{ $tramdomua->tt }}</dd>
            <dt>{{ trans('tramdomuas.tentram') }}</dt>
            <dd>{{ $tramdomua->tentram }}</dd>
            <dt>{{ trans('tramdomuas.diadanh') }}</dt>
            <dd>{{ $tramdomua->diadanh }}</dd>
            <dt>{{ trans('tramdomuas.x') }}</dt>
            <dd>{{ $tramdomua->x }}</dd>
            <dt>{{ trans('tramdomuas.y') }}</dt>
            <dd>{{ $tramdomua->y }}</dd>
            <dt>{{ trans('tramdomuas.geom') }}</dt>
            <dd>{{ $tramdomua->geom }}</dd>
            <dt>{{ trans('tramdomuas.tinh') }}</dt>
            <dd>{{ $tramdomua->tinh }}</dd>
            <dt>{{ trans('tramdomuas.huyen') }}</dt>
            <dd>{{ $tramdomua->huyen }}</dd>
            <dt>{{ trans('tramdomuas.xa') }}</dt>
            <dd>{{ $tramdomua->xa }}</dd>
            <dt>{{ trans('tramdomuas.ghichu') }}</dt>
            <dd>{{ $tramdomua->ghichu }}</dd>
            <dt>{{ trans('tramdomuas.sohieu') }}</dt>
            <dd>{{ $tramdomua->sohieu }}</dd>
            <dt>{{ trans('tramdomuas.mota') }}</dt>
            <dd>{{ $tramdomua->mota }}</dd>

        </dl>

    </div>
</div>

@endsection