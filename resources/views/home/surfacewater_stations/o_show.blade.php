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
                <div class="card m-b-30">
                    <div class="card-header">
                        <h4 class="pull-left mb-0">{{ trans('stations.station_data') }}: {{$station->tentram}}</h4>
                    </div>
                    <div class="card-body">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a id="well-info-tab" class="nav-link active show" data-toggle="tab" href="#well-info"
                                   role="tab" aria-selected="true">
                                    <i class="fa fa-info-circle"></i> Thông tin chung
                                </a>
                            </li>
                            <li class="nav-item">
                                <a id="water-level-tab" class="nav-link" data-toggle="tab" href="#water-level"
                                   role="tab" aria-selected="false">
                                    <i class="fa fa-line-chart"></i> Mực nước
                                </a>
                            </li>
                            <li class="nav-item">
                                <a id="water-flow-tab" class="nav-link" data-toggle="tab"
                                   href="#water-flow"
                                   role="tab" aria-selected="false"><i class="fa fa-thermometer-2"></i> Lưu lượng</a>
                            </li>
                            <li class="nav-item">
                                <a id="chemistry-tab" class="nav-link" data-toggle="tab" href="#chemistry"
                                   role="tab" aria-selected="false"><i class="fa fa-pie-chart"></i> Thành phần hóa</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="well-content">
                            <div class="tab-pane active p-3" id="well-info" role="tabpanel">
                                <div class="table-responsive">
                                    <table class="table table-hover mb-0">
                                        <tbody>
                                        <tr>
                                            <td class="table-active">{{ trans('stations.station_name') }}</td>
                                            <td>{{$station->tentram}}</td>
                                        </tr>
                                        <tr>
                                            <td class="table-active">{{ trans('stations.station_x') }}</td>
                                            <td>{{ number_format($station->toadox, 2)}}</td>
                                        </tr>
                                        <tr>
                                            <td class="table-active">{{ trans('stations.station_y') }}</td>
                                            <td>{{ number_format($station->toadoy, 2)}}</td>
                                        </tr>
                                        <tr>
                                            <td class="table-active">{{ trans('stations.station_z') }}</td>
                                            <td>{{$station->docaoz}}</td>
                                        </tr>
                                        <tr>
                                            <td class="table-active">{{ trans('stations.province') }}</td>
                                            <td>{{$station->tinh}}</td>
                                        </tr>
                                        <tr>
                                            <td class="table-active">{{ trans('stations.district') }}</td>
                                            <td>{{$station->huyen}}</td>
                                        </tr>
                                        <tr>
                                            <td class="table-active">{{ trans('stations.commune') }}</td>
                                            <td>{{$station->xa}}</td>
                                        </tr>
                                        <tr>
                                            <td class="table-active">{{ trans('stations.thongsoqt') }}</td>
                                            <td>{{$station->thongsoqt}}</td>
                                        </tr>
                                        <tr>
                                            <td class="table-active">{{ trans('stations.tensong') }}</td>
                                            <td>{{$station->tensong}}</td>
                                        </tr>
                                        <tr>
                                            <td class="table-active">{{ trans('stations.luuvucsong') }}</td>
                                            <td>{{$station->luuvucsong}}</td>
                                        </tr>

                                        <tr>
                                            <td class="table-active">{{ trans('stations.dientichtn') }}</td>
                                            <td>{{$station->dientichtn}}</td>
                                        </tr>
                                        <tr>
                                            <td class="table-active">{{ trans('stations.capquanly') }}</td>
                                            <td>{{$station->capquanly}}</td>
                                        </tr>
                                        <tr>
                                            <td class="table-active">{{ trans('stations.description') }}</td>
                                            <td>{{$station->mota}}</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane p-3" id="water-level" role="tabpanel">
                                <div class="form-group row justify-content-md-center">
                                    <label class="col-form-label">
                                        <input name="optDataView" id="wl-by-year" value="wl-by-year" checked
                                               type="radio">
                                        {{ trans('stations.water_level') }} - {{$station->tentram}}
                                        - {{ trans('messages.year') }}:&nbsp;&nbsp;
                                    </label>
                                    <div>
                                        <select class="form-control" id="swWlYearSelector"
                                                onchange="changeWlYearData('{{$station->matram}}')">
                                            @foreach($wl_years as $wl_year)
                                                <option>{{$wl_year->data_year}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <label class="col-form-label">
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input
                                                name="optDataView" id="wl-from-to-year"
                                                value="wl-from-to-year"
                                                type="radio">
                                        {{ trans('stations.water_level') }} - {{$station->tentram}}
                                        - {{ trans('messages.from_year') }}:&nbsp;&nbsp;
                                    </label>
                                    `
                                    <div>
                                        <select class="form-control" id="swWlFromYearSelector">
                                            @foreach($wl_years as $wl_year)
                                                <option>{{$wl_year->data_year}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <label class="col-form-label">&nbsp;&nbsp;{{ trans('messages.to_year') }}:&nbsp;&nbsp;</label>
                                    <div>
                                        <select class="form-control" id="swWlToYearSelector">
                                            @foreach($wl_years as $wl_year)
                                                <option>{{$wl_year->data_year}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <label class="col-form-label">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                                    <button type="button" class="btn btn-primary waves-effect waves-light"
                                            id="drawWlFromToChart"
                                            onclick="wlFromTo('{{$station->matram}}')">
                                        <i class="fa fa-line-chart"></i>&nbsp;{{ trans('messages.chart') }}
                                    </button>
                                </div>
                                <div id="water-level-chart">

                                </div>
                            </div>
                            <div class="tab-pane p-3" id="water-flow" role="tabpanel">
                                <div class="form-group row justify-content-md-center">
                                    <label class="col-form-label">{{ trans('stations.water_flow') }}
                                        - {{$station->tentram}} - {{ trans('messages.year') }}:&nbsp;&nbsp;</label>
                                    <div>
                                        <select class="form-control" id="swWfYearSelector"
                                                onchange="changeWfYearData('{{$station->matram}}')">
                                            @foreach($wf_years as $wf_year)
                                                <option>{{$wf_year->data_year}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div id="water-flow-chart">

                                </div>
                            </div>
                            <div class="tab-pane p-3" id="chemistry" role="tabpanel">
                                <p class="font-14 mb-0">
                                </p>
                            </div>
                        </div>
                    </div>
                    {{--end card-body --}}
                </div>
                {{--end card--}}
            </div>
            <div class="col-xl-3">
                <div class="card m-b-30">
                    <div class="card-body">
                        <h4 class="card-title font-20 mt-0 text-center">Sidebar</h4>
                    </div>
                </div>
            </div>
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
