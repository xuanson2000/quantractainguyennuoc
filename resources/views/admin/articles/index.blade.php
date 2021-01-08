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
                            <h4 class="pull-left mb-0">{{ trans('articles.model_plural') }}</h4>
                            <h4 class="pull-right mt-0 mb-0">
                                <a class="btn btn-success waves-effect waves-light pull-right" href="{{ route('articles.article.create') }}" class="btn btn-success" title="{{ trans('articles.create') }}">
                                    <i class="fa fa-plus" aria-hidden="true"></i> {{ trans('articles.create') }}
                                 </a>
                            </h4>
                        </div>
                        @if(count($articles) == 0)
                            <div class="card-body">
                                 <h4>{{ trans('articles.none_available') }}</h4>
                            </div>
                        @else
                            <div class="card-body">
                                <table class="table">
                                    <thead class="thead-default">
                                        <tr>
                                                                        <th>{{ trans('articles.author') }}</th>
                            <th>{{ trans('articles.category_id') }}</th>
                            <th>{{ trans('articles.title') }}</th>
                            <th>{{ trans('articles.slug') }}</th>
                            <th>{{ trans('articles.meta_keywords') }}</th>
                            <th>{{ trans('articles.article_status') }}</th>

                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($articles as $article)
                                        <tr>
                                                                        <td>{{ $article->author }}</td>
                            <td>{{ optional($article->category)->name }}</td>
                            <td>{{ $article->title }}</td>
                            <td>{{ $article->slug }}</td>
                            <td>{{ $article->meta_keywords }}</td>
                            <td>{{ $article->article_status }}</td>

                                             <td>
                                                 <form method="POST" action="{!! route('articles.article.destroy', $article->id) !!}" accept-charset="UTF-8">
                                                     <input name="_method" value="DELETE" type="hidden">
                                                     {{ csrf_field() }}
                                                      <div class="btn-group btn-group-xs pull-right" role="group">
                                                           <a href="{{ route('articles.article.show', $article->id ) }}" class="btn btn-info" title="{{ trans('articles.show') }}">
                                                                <i class="fa fa-eye" aria-hidden="true"></i>
                                                           </a>
                                                           <a href="{{ route('articles.article.edit', $article->id ) }}" class="btn btn-primary" title="{{ trans('articles.edit') }}">
                                                                <i class="fa fa-edit" aria-hidden="true"></i>
                                                           </a>

                                                           <button type="submit" class="btn btn-danger" title="{{ trans('articles.delete') }}" onclick="return confirm(&quot;{{ trans('articles.confirm_delete') }}&quot;)">
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
                                {!! $articles->render() !!}
                            </div>
                         @endif
                    </div>
                </div>
            </div>
    </div>
@endsection

