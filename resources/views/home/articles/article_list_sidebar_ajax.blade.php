<div class="card card-default">
    <div class="card-block">
        <div id="tab_sw_articles" class="tab-pane active show">
            <ul class="news">
                @foreach($sw_articles as $sw_article)
                    <li class="view-list-item">
                                    <span class="views-field views-field-title">
                                        <span class="field-content">
                                            <a href="{{ route('articles.article.show', $sw_article->id ) }}">{{$sw_article->title}}</a>
                                        </span>
                                    </span>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>