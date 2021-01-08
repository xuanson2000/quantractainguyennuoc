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
                <td>{{$well->st_x}}</td>
            </tr>
            <tr>
                <td class="table-active">{{ trans('wells.well_y') }}</td>
                <td>{{$well->st_y}}</td>
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
            </tbody>
        </table>
    </div>
</div>
<div class="tab-pane p-3" id="water-level" role="tabpanel">
    <div class="form-group row justify-content-md-center">
        <label class="radio col-form-label">
            <input name="optDataView" id="wl-by-year" value="wl-by-year" checked type="radio"><i></i>
            Mực nước - {{$well->well_code}} - Năm:&nbsp;&nbsp;
        </label>
        <div>
                <select class="form-control" id="wellWlYearSelector" onchange="changeWlYearData()">
                @foreach($wl_years as $wl_year)
                    <option>{{$wl_year->data_year}}</option>
                @endforeach
            </select>
        </div>
        <label class="radio col-form-label">
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input name="optDataView" id="wl-from-to-year"
                                                                               value="wl-from-to-year"
                                                                               type="radio">
            Mực nước - {{$well->well_code}} - Từ năm:&nbsp;&nbsp;
        </label>
      ` <div>
            <select class="form-control" id="wellWlFromYearSelector">
                @foreach($wl_years as $wl_year)
                    <option>{{$wl_year->data_year}}</option>
                @endforeach
            </select>
        </div>
        <label class="col-form-label">&nbsp;&nbsp;Đến năm:&nbsp;&nbsp;</label>
        <div>
            <select class="form-control" id="wellWlToYearSelector">
                @foreach($wl_years as $wl_year)
                    <option>{{$wl_year->data_year}}</option>
                @endforeach
            </select>
        </div>
        <label class="col-form-label">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
        <button type="button" class="btn btn-primary waves-effect waves-light" id="drawWlFromToChart"
                onclick="wlFromTo()">
            <i class="fa fa-line-chart"></i>&nbsp;Đồ thị
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

