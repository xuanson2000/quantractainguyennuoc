@extends('home.monitoring_wells.show')
@section('show_content')
    <ul class="nav nav-tabs nav-top-border" role="tablist">
        <li class="nav-item">
            <a id="well-historical-tab" class="nav-link active show" data-toggle="tab" href="#well-historical"
               role="tab" aria-selected="true">
                <i class="fa fa-picture-o"></i> {{ trans('wells.well_historical') }}
            </a>
        </li>
        <li class="nav-item">
            <a id="well-depth-tab" class="nav-link" data-toggle="tab" href="#well-depth"
               role="tab" aria-selected="false">
                <i class="fa fa-sort-amount-asc"></i> {{ trans('wells.well_depth') }}
            </a>
        </li>
    </ul>
    <div class="tab-content" id="well-historical-depth">
        <div class="tab-pane active p-3 carousel slide" id="well-historical" role="tabpanel" data-ride="carousel">
            <div class="carousel-inner">
                @if(count($well_history) > 0)
                    @php ($i_item = 1)
                    @foreach($well_history as $well_history_item)
                        @if($i_item == 1)
                            <div class="carousel-item active">
                        @else
                            <div class="carousel-item">
                        @endif
                                <img src="data:image/png;base64,{{$well_history_item->anh}}" alt="...">
                                <div class="carousel-caption d-none d-md-block">
                                    <h5>{{$well_history_item->sukien}}</h5>
                                    <p>Ngày: {{$well_history_item->ngaydienbien}}</p>
                                </div>
                            </div>
                            @php ($i_item++)
                     @endforeach
                @endif
            </div>
            <a class="carousel-control-prev" href="#well-historical" role="button" data-slide="prev">
                 <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                 <span class="sr-only">Trước</span>
            </a>
            <a class="carousel-control-next" href="#well-historical" role="button" data-slide="next">
                 <span class="carousel-control-next-icon" aria-hidden="true"></span>
                 <span class="sr-only">Sau</span>
            </a>
        </div>
        <div class="tab-pane p-3" id="well-depth" role="tabpanel">
            <div class="table-responsive mb-30">
                <table class="table table-hover table-vertical-middle">
                    <thead>
                    <tr>
                        <th class="fw-30">Stt</th>
                        <th>Thời gian</th>
                        <th>Chiều sâu</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(count($well_depth) > 0)
                        @php ($stt = 1)
                        @foreach($well_depth as $well_depth_item)
                            <tr>
                                <td>{{$stt}}</td>
                                <td>{{$well_depth_item->thoigian}}</td>
                                <td>{{$well_depth_item->chieusau}}</td>
                            </tr>
                            @php ($stt++)
                        @endforeach
                    @else
                        <tr>
                            <td>Không có dữ liệu chiều sâu</td>
                        </tr>
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $('#well-historical-data').carousel({
            interval: 5000
        });
    </script>
@endsection
