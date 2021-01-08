<div class="card card-default">
    <div class="card-block">
        <div id="tab_gw_articles" class="tab-pane active show">
            <ul class="news">
                @foreach($gw_articles as $gw_article)
                    <li class="view-list-item">
                                    <span class="views-field views-field-title">
                                        <span class="field-content">
                                            <a href="{{ route('articles.article.show', $gw_article->id ) }}">{{$gw_article->title}}</a>
                                        </span>
                                    </span>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>