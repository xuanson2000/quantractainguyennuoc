@extends('home.layouts.main')
@section('global_js')
    <script type="text/javascript">
        var swAjaxWaterLevelUri = "{{ route('swstations.station.ajax_wl')}}";
        var swAjaxWaterFlowUri = "{{ route('swstations.station.ajax_wf')}}";
    </script>
    <script type="text/javascript" src="{{ asset('js/swwater_charts.js') }}"></script>
@endsection
@section('content')
    <div class="container mt-30">
        <div class="row">
            <div class="col-xl-12 mb-30">
                <h2 class="text-center mb-0">{{ trans('stations.station_data') }}: {{$station->tentram}}</h2>
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
                                    href="{{ route('swstations.station.show_general_info', $station->gid ) }}">{{ trans('surfacewater_stations.swstation_general_info') }}</a>
                        </li>
                        <li class="list-group-item mb-20 {{ Request::is('*water_level') ? 'active' : '' }}"><a
                                    href="{{ route('swstations.station.show_water_level', $station->gid ) }}">{{ trans('surfacewater_stations.water_level') }}</a>
                        </li>
                        <li class="list-group-item mb-20 {{ Request::is('*water_capacity') ? 'active' : '' }}"><a
                                    href="{{ route('swstations.station.show_water_capacity', $station->gid ) }}">{{ trans('surfacewater_stations.water_capacity') }}</a>
                        </li>
                      <!--   <li class="list-group-item mb-20 {{ Request::is('*water_chemistry') ? 'active' : '' }}"><a
                                    href="{{ route('swstations.station.show_water_chemistry', $station->gid ) }}">{{ trans('surfacewater_stations.water_chemistry') }}</a>
                        </li> -->
                    </ul>
                </div>
            </div>
            {{--end col-xl-3--}}
            <div class="col-xl-9">
                @yield('show_content')
            </div>
            {{--end col-xl-9--}}
        </div>
        {{--end row--}}
    </div>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#swWlYearSelector').trigger('change');
            $('#swWfYearSelector').trigger('change');
        });
    </script>
@endsection
