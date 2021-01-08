@extends('home.layouts.main')
@section('global_js')
    <script type="text/javascript">
        var exAjaxWaterLevelUri = "{{ route('waste_waters.waste_water.ww_ajax_vl')}}";
    </script>
    <script type="text/javascript" src="{{ asset('js/ww_charts.js') }}"></script>
@endsection
@section('content')
    <div class="container mt-30">
        <div class="row">
            <div class="col-xl-12 mb-30">
                <h2 class="text-center mb-0">{{ trans('waste_waters.station_data') }}: {{ $wasteWater->sohieu_dks }}</h2>
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
                                    href="{{ route('waste_waters.waste_water.show_general_info', $wasteWater->xt_id ) }}">{{ trans('waste_waters.ww_general_info') }}</a>
                        </li>
                        <li class="list-group-item mb-20 {{ Request::is('*volume') ? 'active' : '' }}"><a
                                    href="{{ route('waste_waters.waste_water.show_discharge_vl', $wasteWater->xt_id ) }}">{{ trans('waste_waters.ww_volume') }}</a>
                        </li>
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
            $('#rfWlYearSelector').trigger('change');
        });
    </script>

@endsection