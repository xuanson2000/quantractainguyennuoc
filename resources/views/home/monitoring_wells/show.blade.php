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
        <div class="container mt-30">
            <div class="row">
                <div class="col-xl-12 mb-30">
                    <h2 class="text-center mb-0">{{ trans('wells.well_data') }}: {{$well->well_code}}</h2>
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
                                        href="{{ route('wells.well.show_general_info', $well->id ) }}">{{ trans('wells.station_info') }}</a>
                            </li>
                            <li class="list-group-item mb-20 {{ Request::is('*history_depth') ? 'active' : '' }}"><a
                                        href="{{ route('wells.well.show_history_depth', $well->id ) }}">{{ trans('wells.history_depth') }}</a>
                            </li>
                            <li class="list-group-item mb-20 {{ Request::is('*structure_lithology') ? 'active' : '' }}">
                                <a href="{{ route('wells.well.show_structure_lithology', $well->id ) }}">{{ trans('wells.structure_lithology') }}</a>
                            </li>
                            <li class="list-group-item mb-20 {{ Request::is('*water_level') ? 'active' : '' }}"><a
                                        href="{{ route('wells.well.show_water_level', $well->id ) }}">{{ trans('wells.water_level') }}</a>
                            </li>
                            <li class="list-group-item mb-20 {{ Request::is('*water_temperature') ? 'active' : '' }}"><a
                                        href="{{ route('wells.well.show_water_temperature', $well->id ) }}">{{ trans('wells.water_temperature') }}</a>
                            </li>
                            <li class="list-group-item mb-20 {{ Request::is('*water_chemistry') ? 'active' : '' }}"><a
                                        href="{{ route('wells.well.show_water_chemistry', $well->id ) }}">{{ trans('wells.water_chemistry') }}</a>
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
    <script type="text/javascript">
        $(document).ready(function () {
            $('#wellWlYearSelector').trigger('change');
            $('#wellWtYearSelector').trigger('change');
        });
    </script>
@endsection
