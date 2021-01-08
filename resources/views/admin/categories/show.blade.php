@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($category->name) ? $category->name : 'Category' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('categories.category.destroy', $category->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('categories.category.index') }}" class="btn btn-primary" title="{{ trans('categories.show_all') }}">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('categories.category.create') }}" class="btn btn-success" title="{{ trans('categories.create') }}">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('categories.category.edit', $category->id ) }}" class="btn btn-primary" title="{{ trans('categories.edit') }}">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="{{ trans('categories.delete') }}" onclick="return confirm(&quot;{{ trans('categories.confirm_delete') }}?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>{{ trans('categories.name') }}</dt>
            <dd>{{ $category->name }}</dd>
            <dt>{{ trans('categories.slug') }}</dt>
            <dd>{{ $category->slug }}</dd>
            <dt>{{ trans('categories.parent_id') }}</dt>
            <dd>{{ optional($category->parent)->name }}</dd>
            <dt>{{ trans('categories.cat_order') }}</dt>
            <dd>{{ $category->cat_order }}</dd>
            <dt>{{ trans('categories.created_at') }}</dt>
            <dd>{{ $category->created_at }}</dd>
            <dt>{{ trans('categories.updated_at') }}</dt>
            <dd>{{ $category->updated_at }}</dd>

        </dl>

    </div>
</div>

@endsection