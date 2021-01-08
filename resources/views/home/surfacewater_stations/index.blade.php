@extends('home.layouts.main')
@section('global_js')
    <script type="text/javascript">


    </script>
@endsection
@section('content')
        <div class="container mt-30">
            <div class="row">
                <div class="col-md-2">
                    <div class="side-nav">
                        <div class="side-nav-head">
                            <button class="fa fa-bars"></button>
                            <h4>LỌC DỮ LIỆU</h4>
                        </div>
                        <ul class="list-group list-group-bordered list-group-noicon">
                            <li class="list-group-item active">
                                <a class="dropdown-toggle" href="#">VÙNG QUAN TRẮC</a>
                                <ul style="display: block;">
                                    @foreach($monitoring_networks as $network)
                                        @if($network->id == $id_active)
                                            <li class="active"><a href="{{ route('wells.well.network', $network->id ) }}">{{$network->network_name}}</a></li>
                                        @else
                                            <li><a href="{{ route('wells.well.network', $network->id ) }}">{{$network->network_name}}</a></li>
                                        @endif
                                    @endforeach
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>


                <div class="col-md-10">
                    <div class="card m-b-30">
                        <div class="card-header">
                            <h4 class="pull-left mb-0">{{ trans('stations.station_data') }}</h4>
                        </div>
                        @if(count($stations) == 0)
                            <div class="card-body">
                                <h4 class="card-title font-20 mt-0 text-center">{{ trans('stations.none_available') }}</h4>
                            </div>
                        @else
                            <div class="card-body">
                                

                                    <table class="table table-bordered">
                                        <thead class="thead-default">
                                        <tr>
                                            <th>{{ trans('surfacewater_stations.station_name') }}</th>
                                            <th>{{ trans('surfacewater_stations.station_x') }}</th>
                                            <th>{{ trans('surfacewater_stations.station_y') }}</th>
                                             <th>Vị trí hành chính</th>
                                             <!-- <th>{{ trans('surfacewater_stations.commune') }}</th>
                                            <th>{{ trans('surfacewater_stations.district') }}</th>
                                            <th>{{ trans('surfacewater_stations.province') }}</th> -->
                                            
                                           
                                            <th style="width: 150px;">{{ trans('surfacewater_stations.thongsoqt') }}</th>
                                            <th>{{ trans('surfacewater_stations.tensong') }}</th>
                                            <th> Chi tiết</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($stations as $station)
                                            <tr>
                                                <td>{{ $station->tentram }}</td>
                                                <td>{{ number_format($station->st_x, 2)}}</td>
                                                <td>{{ number_format($station->st_y, 2) }}</td>
                                              <!--   <td>{{ $station->tinh }}</td>
                                                <td>{{ $station->huyen }}</td> -->
                                                <td> Xã {{ $station->xa }} - Huyện {{ $station->huyen }} - Tỉnh {{ $station->tinh }}</td>
                                                <td>{{ $station->thongsoqt }}</td>
                                                <td>{{ $station->tensong }}</td>
                                                <td>
                                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                                        <a style="color: blue;"  href="{{ route('swstations.station.show', $station->gid ) }}">
                                                            Xem 
                                                        </a>
                                                    </div>

                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                             
                            </div>
                            <div class="card-footer">
                                {!! $stations->render() !!}
                            </div>
                        @endif
                    </div>
                </div>

            </div>
        </div>
@endsection
