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
    <script type="text/javascript" src="{{ asset('js/water_charts.js') }}"></script>
@endsection
@section('content')
    <div class="container mt-30" >
        <div class="row mb-30">
            <div class="col-xl-8" style="font-family:'Times New Roman', Times, serif;">
                <div class="row article-title">
                    <h2 style="font-family:'Times New Roman', Times, serif;" class="pull-left mt-5 mb-5">{{isset($article->title) ? $article->title : 'Article' }}
                    </h2>

                </div>
                <div class="row">
                    <div class="col-md-10"> <p style="color: #7F93A8;">{{$article->created_at}}</p></div>
                    <div class="col-md-2" style="float: right;"> <i class="fa fa-facebook-official" aria-hidden="true"></i> <i class="fa fa-google-plus-square" aria-hidden="true"></i> <i class="fa fa-twitter-square" aria-hidden="true"></i> <i class="fa fa-linkedin-square" aria-hidden="true"></i></div>
                </div>
            
                <div class="row">

                    <p style="font-size: 15px; color: red;">{!!$article->content!!} </p>
                </div>
                <div style="font-family:'Times New Roman', Times, serif; " class="row">{{trans('articles.category_id') }}:
                    {{ optional($article->category)->name }}</div>

                </div>



            <div class="col-xl-4">
                <div class="side-nav">
                    <div class="side-nav-head">
                        <button class="fa fa-bars"></button>
                       
                    </div>
                    <ul class="list-group list-group-bordered list-group-noicon">
                     <!--    <li class="list-group-item">
                            <a class="dropdown-toggle" href="#">FILE ĐÍNH KÈM</a>
                            <div class="table-responsive">
                                <table class="table table-hover table-vertical-middle">
                                    <tbody>
                                    <tr>
                                        <td class="text-center file-icon"><i class="fa fa-file-word-o"></i></td>
                                        <td>Bản tin 1</td>
                                        <td>
                                            <a href="#" class="btn btn-success">
                                                <i class="fa fa-download p-0"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center file-icon"><i class="fa fa-file-pdf-o"></i></td>
                                        <td>Bản tin PDF</td>
                                        <td>
                                            <a href="#" class="btn btn-success">
                                                <i class="fa fa-download p-0"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </li> -->
                        <li class="list-group-item">
                            <a style="color: black;" class="dropdown-toggle" href="#">HÌNH ẢNH</a>
                            <div class="table-responsive">
                                <table class="table table-hover table-vertical-middle">
                                    <tbody>
                                    <tr>
                                        <td>
                                         
                                          
                                           
                                            <div class="text-center">
                                                <a data-toggle="lightbox" href="{{ URL::to('/') }}/source/imganh/product/{{ $article->image }}" >
                                                   
                                                <img src="{{ URL::to('/') }}/source/imganh/product/{{ $article->image }}" alt="db" style="width: 80%;" />

                                                  

                                                </a>
                                            </div>
                                            <div class="text-center">
                                             <!--    <p class="text-center">Sơ đồ dự báo diễn biến mực nước tầng qp3</p> -->
                                            </div>
                                        </td>

                                    </tr>
                                    <tr>
                                        <!-- <td>
                                            <div class="text-center">
                                                <a data-toggle="lightbox" href="{{ asset('images/wl_62018_qp23.png') }}">
                                                    <img src="{{ asset('images/wl_62018_qp23.png') }}" alt="" style="width: 60%;">
                                                </a>
                                            </div>
                                            <div class="text-center">
                                                <p class="text-center">Sơ đồ diễn biến mực nước tháng 6 năm 2018 tầng qp2-3</p>
                                            </div>

                                        </td> -->
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

@endsection