@extends('home.layouts.main')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card m-b-30">
                    <div class="card-header">
                        <h4 class="pull-left mb-0">{{ !empty($article->author) ? $article->author : 'Article' }}</h4>
                        <div class="btn-group  mt-0 mb-0 pull-right" role="group">
                            <a href="{{ route('articles.article.index') }}" class="btn btn-primary waves-effect waves-light" title="{{ trans('articles.show_all') }}">
                                <i class="fa fa-list" aria-hidden="true"></i> {{ trans('articles.show_all') }}
                            </a>
                            <a href="{{ route('articles.article.create') }}" class="btn btn-success waves-effect waves-light" title="{{ trans('articles.create') }}">
                                <i class="fa fa-plus" aria-hidden="true"></i> {{ trans('articles.create') }}
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        <form method="POST" action="{{ route('articles.article.update', $article->id) }}" id="edit_article_form" name="edit_article_form" accept-charset="UTF-8" class="form-horizontal">
                            {{ csrf_field() }}
                            <input name="_method" type="hidden" value="PUT">
                            @include ('articles.form', ['article' => $article,])

                            <div class="form-group">
                                <div class="col-md-offset-2 col-md-10">
                                    <input class="btn btn-primary" type="submit" value="{{ trans('articles.update') }}">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection