@extends('home.layouts.main')
@section('global_js')
    <script type="text/javascript">


    </script>
@endsection
@section('content')
    <div class="container mt-30">
        <div class="row">
            <div class="col-xl-3">
                <div class="side-nav">
                    <div class="side-nav-head">
                        <button class="fa fa-bars"></button>
                        <h4>PHÂN LOẠI BẢN TIN</h4>
                    </div>
                    <ul class="list-group list-group-bordered list-group-noicon">
                        <li class="list-group-item active">
                            <a class="dropdown-toggle" href="#">TIN CẢNH BÁO, DỰ BÁO NƯỚC MẶT</a>
                            <ul style="display: block;">
                                @foreach($sw_cats as $sw_cat)
                                    @if($sw_cat->id == $id_active)
                                        <li class="active"><a
                                                    href="{{ route('articles.article.category', $sw_cat->id ) }}">{{$sw_cat->name}}</a>
                                        </li>
                                    @else
                                        <li>
                                            <a href="{{ route('articles.article.category', $sw_cat->id ) }}">{{$sw_cat->name}}</a>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        </li>
                        <li class="list-group-item active">
                            <a class="dropdown-toggle" href="#">TIN CẢNH BÁO, DỰ BÁO NƯỚC DƯỚI ĐẤTT</a>
                            <ul style="display: block;">
                                @foreach($gw_cats as $gw_cat)
                                    @if($gw_cat->id == $id_active)
                                        <li class="active"><a
                                                    href="{{ route('articles.article.category', $gw_cat->id ) }}">{{$gw_cat->name}}</a>
                                        </li>
                                    @else
                                        <li>
                                            <a href="{{ route('articles.article.category', $gw_cat->id ) }}">{{$gw_cat->name}}</a>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        </li>
                        <li class="list-group-item active">
                            <a class="dropdown-toggle" href="#">TIN CHUYÊN ĐỀ</a>
                            <ul style="display: block;">
                                @foreach($rp_cats as $rp_cat)
                                    @if($rp_cat->id == $id_active)
                                        <li class="active"><a
                                                    href="{{ route('articles.article.category', $rp_cat->id ) }}">{{$rp_cat->name}}</a>
                                        </li>
                                    @else
                                        <li>
                                            <a href="{{ route('articles.article.category', $rp_cat->id ) }}">{{$rp_cat->name}}</a>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="col-xl-9">
                <div class="card m-b-30">
                    <div class="card-header">
                        <h4 class="pull-left mb-0">{{ trans('articles.model_plural') }}</h4>
                    </div>
                    @if(count($articles) == 0)
                        <div class="card-body">
                            <h4 class="card-title font-20 mt-0 text-center">{{ trans('articles.none_available') }}</h4>
                        </div>
                    @else
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class="thead-default">
                                    <tr>
                                        <th>{{ trans('articles.author') }}</th>
                                        <th>{{ trans('articles.category_id') }}</th>
                                        <th>{{ trans('articles.title') }}</th>
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
                                            <td>{{ $article->article_status }}</td>
                                            <td>
                                                <div class="btn-group btn-group-xs pull-right" role="group">
                                                    <a href="{{ route('articles.article.show', $article->id ) }}"
                                                       class="btn btn-outline-info" title="{{ trans('articles.detail') }}">
                                                        <i class="fa fa-eye" aria-hidden="true"></i>{{ trans('articles.detail') }}
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
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

