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
                <h3 class="text-center mb-0">{{ trans('wells.well_data') }}: {{$well->well_code}}</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-3">
                <div class="card m-b-30">
                    <div class="card-body">
                        <h4 class="card-title font-20 mt-0 text-center">Sidebar</h4>
                    </div>
                </div>
            </div>
            <div class="col-xl-9">
                <div class="card m-b-30">
                    <div class="card-header">
                        <h4 class="pull-left mb-0">{{ trans('wells.well_data') }}: {{$well->well_code}}</h4>
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
                                <a id="water-temperature-tab" class="nav-link" data-toggle="tab"
                                   href="#water-temperature"
                                   role="tab" aria-selected="false"><i class="fa fa-thermometer-2"></i> Nhiệt độ
                                    nước</a>
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
                                            <td class="table-active">{{ trans('wells.well_name') }}</td>
                                            <td>{{$well->well_code}}</td>
                                        </tr>
                                        <tr>
                                            <td class="table-active">{{ trans('wells.well_x') }}</td>
                                            <td>{{ number_format($well->st_x, 2)}}</td>
                                        </tr>
                                        <tr>
                                            <td class="table-active">{{ trans('wells.well_y') }}</td>
                                            <td>{{ number_format($well->st_y, 2)}}</td>
                                        </tr>
                                        <tr>
                                            <td class="table-active">{{ trans('wells.elevation') }}</td>
                                            <td>{{$well->elevation}}</td>
                                        </tr>
                                        <tr>
                                            <td class="table-active">{{ trans('wells.province') }}</td>
                                            <td>{{$well->province}}</td>
                                        </tr>
                                        <tr>
                                            <td class="table-active">{{ trans('wells.district') }}</td>
                                            <td>{{$well->district}}</td>
                                        </tr>
                                        <tr>
                                            <td class="table-active">{{ trans('wells.commune') }}</td>
                                            <td>{{$well->commune}}</td>
                                        </tr>
                                        <tr>
                                            <td class="table-active">{{ trans('wells.monitoring_region') }}</td>
                                            <td>{{$well->id_monitoring_network}}</td>
                                        </tr>
                                        <tr>
                                            <td class="table-active">{{ trans('wells.monitoring_line') }}</td>
                                            <td>{{$well->id_monitoring_line}}</td>
                                        </tr>
                                        <tr>
                                            <td class="table-active">{{ trans('wells.water_layer') }}</td>
                                            <td>{{$well->water_layer}}</td>
                                        </tr>

                                        <tr>
                                            <td class="table-active">{{ trans('wells.static_water_level') }}</td>
                                            <td>{{$well->static_water_level}}</td>
                                        </tr>
                                        <tr>
                                            <td class="table-active">{{ trans('wells.water_flow') }}</td>
                                            <td>{{$well->water_flow}}</td>
                                        </tr>
                                        <tr>
                                            <td class="table-active">{{ trans('wells.drawdown') }}</td>
                                            <td>{{$well->drawdown}}</td>
                                        </tr>
                                        <tr>
                                            <td class="table-active">{{ trans('wells.water_flow_coeff') }}</td>
                                            <td>{{$well->water_flow_coeff}}</td>
                                        </tr>
                                        <tr>
                                            <td class="table-active">{{ trans('wells.coeff_k') }}</td>
                                            <td>{{$well->coeff_k}}</td>
                                        </tr>
                                        <tr>
                                            <td class="table-active">{{ trans('wells.coeff_km') }}</td>
                                            <td>{{$well->coeff_km}}</td>
                                        </tr>
                                        <tr>
                                            <td class="table-active">{{ trans('wells.coeff_a') }}</td>
                                            <td>{{$well->coeff_a}}</td>
                                        </tr>
                                        <tr>
                                            <td class="table-active">{{ trans('wells.coeff_muy') }}</td>
                                            <td>{{$well->coeff_muy}}</td>
                                        </tr>
                                        <tr>
                                            <td class="table-active">{{ trans('wells.monitor_meteo') }}</td>
                                            <td>{{$well->monitor_meteo}}</td>
                                        </tr>
                                        <tr>
                                            <td class="table-active">{{ trans('wells.monitor_hydro') }}</td>
                                            <td>{{$well->monitor_hydro}}</td>
                                        </tr>
                                        <tr>
                                            <td class="table-active">{{ trans('wells.monitor_level') }}</td>
                                            <td>{{$well->monitor_level}}</td>
                                        </tr>
                                        <tr>
                                            <td class="table-active">{{ trans('wells.monitor_water_flow') }}</td>
                                            <td>{{$well->monitor_water_flow}}</td>
                                        </tr>
                                        <tr>
                                            <td class="table-active">{{ trans('wells.monitor_templature') }}</td>
                                            <td>{{$well->monitor_templature}}</td>
                                        </tr>
                                        <tr>
                                            <td class="table-active">{{ trans('wells.monitor_chemistry') }}</td>
                                            <td>{{$well->monitor_chemistry}}</td>
                                        </tr>
                                        <tr>
                                            <td class="table-active">{{ trans('wells.start_date') }}</td>
                                            <td>{{$well->start_date}}</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane p-3" id="water-level" role="tabpanel">
                                <div class="form-group row justify-content-md-center">
                                    <label class="radio">
                                        <input name="optDataView" id="wl-by-year" value="wl-by-year" checked
                                               type="radio"><i></i>
                                        {{ trans('wells.water_level') }} - {{$well->well_code}}
                                        - {{ trans('messages.year') }}:&nbsp;&nbsp;
                                    </label>
                                    <div>
                                        <select class="form-control" id="wellWlYearSelector"
                                                onchange="changeWlYearData('{{$well->well_code}}')">
                                            @foreach($wl_years as $wl_year)
                                                <option>{{$wl_year->data_year}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <label class="radio">
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input
                                                name="optDataView" id="wl-from-to-year"
                                                value="wl-from-to-year"
                                                type="radio"><i></i>
                                        {{ trans('wells.water_level') }} - {{$well->well_code}}
                                        - {{ trans('messages.from_year') }}:&nbsp;&nbsp;
                                    </label>
                                    <div>
                                        <select class="form-control" id="wellWlFromYearSelector">
                                            @foreach($wl_years as $wl_year)
                                                <option>{{$wl_year->data_year}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <label class="col-form-label">&nbsp;&nbsp;{{ trans('messages.to_year') }}:&nbsp;&nbsp;</label>
                                    <div>
                                        <select class="form-control" id="wellWlToYearSelector">
                                            @foreach($wl_years as $wl_year)
                                                <option>{{$wl_year->data_year}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <label class="col-form-label">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                                    <button type="button" class="btn btn-lg btn-primary waves-effect waves-light"
                                            id="drawWlFromToChart"
                                            onclick="wlFromTo('{{$well->well_code}}')">
                                        <i class="fa fa-line-chart"></i>&nbsp;{{ trans('messages.chart') }}
                                    </button>
                                </div>
                                <div id="water-level-chart">

                                </div>
                            </div>
                            <div class="tab-pane p-3" id="water-temperature" role="tabpanel">
                                <div class="form-group row justify-content-md-center">
                                    <label class="col-form-label">{{ trans('wells.water_temperature') }}
                                        - {{$well->well_code}} - {{ trans('messages.year') }}:&nbsp;&nbsp;</label>
                                    <div>
                                        <select class="form-control" id="wellWtYearSelector"
                                                onchange="changeWtYearData('{{$well->well_code}}')">
                                            @foreach($wt_years as $wt_year)
                                                <option>{{$wt_year->data_year}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div id="water-temperature-chart">

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
