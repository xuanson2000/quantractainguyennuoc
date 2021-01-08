@extends('home.layouts.main')
@section('global_js')
    <script type="text/javascript">
        var rfAjaxRainfallUri = "{{ route('tramdomuas.tramdomua.ajax_rainfall')}}";
    </script>
    <script type="text/javascript" src="{{ asset('js/rain_charts.js') }}"></script>
@endsection
@section('content')
    <div class="container mt-30">
        <div class="row">
            <div class="col-xl-12 mb-30">
                <h2 class="text-center mb-0">{{ trans('tramdomuas.station_data') }}: {{ $tramdomua->tentram }}</h2>
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
                                    href="{{ route('tramdomuas.tramdomua.show_general_info', $tramdomua->gid ) }}">{{ trans('tramdomuas.tramdomua_general_info') }}</a>
                        </li>
                        <li class="list-group-item mb-20 {{ Request::is('*rainfall') ? 'active' : '' }}"><a
                                    href="{{ route('tramdomuas.tramdomua.show_rainfall', $tramdomua->gid ) }}">{{ trans('tramdomuas.rainfall') }}</a>
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


