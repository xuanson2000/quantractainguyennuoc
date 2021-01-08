@extends('home.layouts.main')
@section('global_js')
    <script type="text/javascript">
        var meteoAjaxEvaUri = "{{ route('meteorology_stations.meteorology_station.ajax_eva')}}";
        var meteoAjaxAirTemperatureUri = "{{ route('meteorology_stations.meteorology_station.ajax_air_temperature')}}";
        var meteoAjaxHumiUri = "{{ route('meteorology_stations.meteorology_station.ajax_humi')}}";
        var meteoAjaxSunnyUri = "{{ route('meteorology_stations.meteorology_station.ajax_sunny')}}";
        var meteoAjaxWindyUri = "{{ route('meteorology_stations.meteorology_station.ajax_windy')}}";
    </script>
    <script type="text/javascript" src="{{ asset('js/water_charts.js') }}"></script>
@endsection
@section('content')
    <div class="container mt-30">
        <div class="row">
            <div class="col-xl-12 mb-30">
                <h2 class="text-center mb-0">{{ trans('wells.well_data') }}: {{$meteorologyStation->tentram}}</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-3">
                <div class="side-nav">
                    <div class="side-nav-head">
                        <button class="fa fa-bars"></button>
                        <h4>DANH MỤC DỮ LIỆU</h4>
                    </div>
                    <ul class="list-group list-unstyled">
                        <li class="list-group-item mb-20 {{ Request::is('*general_info') ? 'active' : '' }}"><a
                                    href="{{ route('meteorology_stations.meteorology_station.show_general_info', $meteorologyStation->gid ) }}">{{ trans('meteorology_stations.station_info') }}</a>
                        </li>
                        <li class="list-group-item mb-20 {{ Request::is('*evaporation') ? 'active' : '' }}"><a
                                    href="{{ route('meteorology_stations.meteorology_station.show_evaporation', $meteorologyStation->gid ) }}">{{ trans('meteorology_stations.evaporation') }}</a>
                        </li>
                        <li class="list-group-item mb-20 {{ Request::is('*rainfall') ? 'active' : '' }}">
                            <a href="{{ route('meteorology_stations.meteorology_station.show_rainfall', $meteorologyStation->gid ) }}">{{ trans('meteorology_stations.rainfall') }}</a>
                        </li>
                        <li class="list-group-item mb-20 {{ Request::is('*air_temperature') ? 'active' : '' }}">
                            <a href="{{ route('meteorology_stations.meteorology_station.show_air_temperature', $meteorologyStation->gid ) }}">{{ trans('meteorology_stations.air_temperature') }}</a>
                        </li>
                        <li class="list-group-item mb-20 {{ Request::is('*humidity') ? 'active' : '' }}"><a
                                    href="{{ route('meteorology_stations.meteorology_station.show_humidity', $meteorologyStation->gid ) }}">{{ trans('meteorology_stations.humidity') }}</a>
                        </li>
                        <li class="list-group-item mb-20 {{ Request::is('*sunny') ? 'active' : '' }}"><a
                                    href="{{ route('meteorology_stations.meteorology_station.show_sunny', $meteorologyStation->gid ) }}">{{ trans('meteorology_stations.sunny') }}</a>
                        </li>
                        <li class="list-group-item mb-20 {{ Request::is('*windy') ? 'active' : '' }}"><a
                                    href="{{ route('meteorology_stations.meteorology_station.show_windy', $meteorologyStation->gid ) }}">{{ trans('meteorology_stations.windy') }}</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-xl-9">
                @yield('show_content')
            </div>
            {{--end col-xl-9--}}
        </div>
        {{--end row--}}
    </div>
@endsection
