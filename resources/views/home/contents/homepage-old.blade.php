@extends('home.layouts.main')
@section('global_js')
    <script type="text/javascript">
        var wellAjaxUri = "{{ route('wells.well.ajax')}}";
        var wellAjaxContentUri = "{{ route('wells.well.ajax_content')}}";
        var wellAjaxWaterLevelUri = "{{ route('wells.well.ajax_wl')}}";
        var wellAjaxWaterTemperatureUri = "{{ route('wells.well.ajax_wt')}}";
        var wellAjaxListUri = "{{ route('wells.well.ajax_well_list')}}";
        var wellAjaxSearchListUri = "{{ route('wells.well.ajax_well_search')}}";
        var wellAjaxLocationUri = "{{ route('wells.well.ajax_well_location')}}";

    </script>
@endsection
@section('content')
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100p" src="{{ asset('images/waterslide1.jpg') }}" alt="First slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100p" src="{{ asset('images/waterslide2.jpg') }}" alt="Second slide">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <section>
    <div id="monitoring-data" class="alternate pl-15 pr-15 pt-30 pb-30">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="card card-default data-list">
                        <div class="card-heading">
                            <h3><i class="fa fa-database"></i> Dữ liệu</h3>
                        </div>
                        <div class="card-block pt-50">
                            <div class="row">
                                <div class="col-md-6 mb-30 col-6">
                                    <div class="text-center">
                                        <figure>
                                            <img class="rounded" src="{{ asset('images/groundwater.png') }}" alt="">
                                        </figure>
                                        <h4><a href="{{ route('wells.well.index')}}">Quan trắc tài nguyên nước dưới đất</a></h4>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-30 col-6">
                                    <div class="text-center">
                                        <figure>
                                            <img class="rounded" src="{{ asset('images/surface_water.png') }}" alt="">
                                        </figure>
                                        <h4><a href="{{ route('swstations.stations.index')}}">Quan trắc tài nguyên nước mặt</a></h4>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-30 col-6">
                                    <div class="text-center">
                                        <figure>
                                            <img class="rounded" src="{{ asset('images/meteo.png') }}" alt="">
                                        </figure>
                                        <h4>Dữ liệu khí tượng</h4>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-30 col-6">
                                    <div class="text-center">
                                        <figure>
                                            <img class="rounded" src="{{ asset('images/groundwater.png') }}" alt="">
                                        </figure>
                                        <h4>Khai thác nước dưới đất</h4>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-30 col-6">
                                    <div class="text-center">
                                        <figure>
                                            <img class="rounded" src="{{ asset('images/exploiting.png') }}" alt="">
                                        </figure>
                                        <h4>Khai thác nước mặt</h4>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-30 col-6">
                                    <div class="text-center">
                                        <figure>
                                            <img class="rounded" src="{{ asset('images/discharge.png') }}" alt="">
                                        </figure>
                                        <h4>Xả thải vào nguồn nước</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card card-default">
                        <div class="card-heading">
                            <h3><i class="fa fa-bell-o"></i> Tin cảnh báo - Dự báo</h3>
                        </div>
                        <div class="card-block">
                            <ul class="nav nav-tabs nav-top-border">
                                <li class="nav-item"><a class="nav-link active show" href="#tab_sw_articles"
                                                        data-toggle="tab">Nước mặt</a></li>
                                <li class="nav-item"><a class="nav-link" href="#tab_gw_articles" data-toggle="tab">Nước
                                        dưới đất</a></li>
                                <li class="nav-item"><a class="nav-link" href="#tab_year_book" data-toggle="tab">Niên
                                        giám - thống kê</a></li>
                            </ul>

                            <div class="tab-content">
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
                                <div id="tab_gw_articles" class="tab-pane fade">
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
                                <div id="tab_year_book" class="tab-pane fade">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsam quidem voluptatem
                                        accusantium praesentium inventore quae illum. Lorem eos quos voluptate omnis
                                        deleniti molestiae numquam fugiat delectus.</p>
                                    <p>
                                    </p>
                                    <p>Officia illum eos quos voluptate omnis deleniti molestiae numquam fugiat delectus
                                        aliquam ab.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    </section>
    <section>
        <div class="container">
            <header class="mb-60">
                <h2><i class="fa fa-bell-o"></i> Tin cảnh báo - Dự báo</h2>
            </header>


        </div>
    </section>
@endsection