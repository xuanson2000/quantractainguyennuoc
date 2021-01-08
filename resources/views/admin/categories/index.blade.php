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
                            <h4 class="pull-left mb-0">{{ trans('categories.model_plural') }}</h4>
                            <h4 class="pull-right mt-0 mb-0">
                                <a class="btn btn-success waves-effect waves-light pull-right" href="{{ route('categories.category.create') }}" class="btn btn-success" title="{{ trans('categories.create') }}">
                                    <i class="fa fa-plus" aria-hidden="true"></i> {{ trans('categories.create') }}
                                 </a>
                            </h4>
                        </div>
                        @if(count($categories) == 0)
                            <div class="card-body">
                                 <h4>{{ trans('categories.none_available') }}</h4>
                            </div>
                        @else
                            <div class="card-body">
                                <table class="table">
                                    <thead class="thead-default">
                                        <tr>
                                                                        <th>{{ trans('categories.name') }}</th>
                            <th>{{ trans('categories.slug') }}</th>
                            <th>{{ trans('categories.parent_id') }}</th>
                            <th>{{ trans('categories.cat_order') }}</th>

                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($categories as $category)
                                        <tr>
                                                                        <td>{{ $category->name }}</td>
                            <td>{{ $category->slug }}</td>
                            <td>{{ optional($category->parent)->name }}</td>
                            <td>{{ $category->cat_order }}</td>

                                             <td>
                                                 <form method="POST" action="{!! route('categories.category.destroy', $category->id) !!}" accept-charset="UTF-8">
                                                     <input name="_method" value="DELETE" type="hidden">
                                                     {{ csrf_field() }}
                                                      <div class="btn-group btn-group-xs pull-right" role="group">
                                                           <a href="{{ route('categories.category.show', $category->id ) }}" class="btn btn-info" title="{{ trans('categories.show') }}">
                                                                <i class="fa fa-eye" aria-hidden="true"></i>
                                                           </a>
                                                           <a href="{{ route('categories.category.edit', $category->id ) }}" class="btn btn-primary" title="{{ trans('categories.edit') }}">
                                                                <i class="fa fa-edit" aria-hidden="true"></i>
                                                           </a>

                                                           <button type="submit" class="btn btn-danger" title="{{ trans('categories.delete') }}" onclick="return confirm(&quot;{{ trans('categories.confirm_delete') }}&quot;)">
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
                                {!! $categories->render() !!}
                            </div>
                         @endif
                    </div>
                </div>
            </div>
    </div>
@endsection

