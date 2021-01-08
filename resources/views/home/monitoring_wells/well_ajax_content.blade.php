<div class="tab-pane active p-3" id="well-info" role="tabpanel">
    <div class="table-responsive">
        <table class="table table-hover mb-0">
            <tbody>
            <tr>
                <td class="table-active">{{ trans('wells.well_name') }}</td>
                <td>{{$well->well_code}}</td>
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
                <td class="table-active">{{ trans('wells.water_layer') }}</td>
                <td>{{$well->water_layer}}</td>
            </tr>
            </tbody>
        </table>
    </div>
</div>
<div class="tab-pane p-3" id="water-level" role="tabpanel">
    <div class="form-group row">
        <div class="col-md-4 col-sm-4">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <label class="radio">
                        <input name="optDataView" id="wl-by-year" value="wl-by-year" checked type="radio"><i></i>
                        {{ trans('messages.by_year') }}
                    </label>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <select class="form-control" id="wellWlYearSelector" onchange="changeWlYearData()">
                        <option value="">--- {{ trans('messages.select_year') }} ---</option>
                        @foreach($wl_years as $wl_year)
                            <option>{{$wl_year->data_year}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="col-md-8 col-sm-8">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <label class="radio">
                        <input name="optDataView" id="wl-from-to-year" value="wl-from-to-year"
                               type="radio"><i></i>{{ trans('messages.by_time_period') }}
                    </label>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-sm-6">
                    <div class="row">
                        <label class="col-md-2 col-sm-2 inline-text">{{ trans('messages.from_year') }}: </label>
                        <div class="col-md-10 col-sm-10">
                            <div class="input-group">
                                <select class="form-control" id="wellWlFromYearSelector">
                                    <option value="">--- {{ trans('messages.select_year') }} ---</option>
                                    @foreach($wl_years as $wl_year)
                                        <option>{{$wl_year->data_year}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                    </div>

                </div>
                <div class="col-md-6 col-sm-6 float-md-left">
                    <div class="row">
                        <label class="col-md-2 col-sm-2 inline-text">{{ trans('messages.to_year') }}: </label>
                        <div class="col-md-10 col-sm-10">
                            <div class="input-group">

                                <select class="form-control" id="wellWlToYearSelector">
                                    <option value="">--- {{ trans('messages.select_year') }} ---</option>
                                    @foreach($wl_years as $wl_year)
                                        <option>{{$wl_year->data_year}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="btn-bar float-right">
        <button type="button" class="btn btn-primary waves-effect waves-light"
                id="drawWlFromToChart"
                onclick="wlFromTo()">
            <i class="fa fa-table"></i>&nbsp;{{ trans('messages.display_chart_data') }}
        </button>
    </div>

    <div id="water-level-chart">

    </div>
</div>
<div class="tab-pane p-3" id="water-temperature" role="tabpanel">
    <div class="form-group row justify-content-md-center">
        <label class="col-form-label">Nhiệt độ nước - {{$well->well_code}} - Năm:&nbsp;&nbsp;</label>
        <div>
            <select class="form-control" id="wellWtYearSelector" onchange="changeWtYearData()">
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

