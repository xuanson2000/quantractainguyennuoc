@extends('home.monitoring_wells.show')
@section('show_content')
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

    <script type="text/javascript">
        $(document).ready(function () {
            $('#wellWlYearSelector').trigger('change');
        });
    </script>
@endsection
