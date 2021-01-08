@extends('home.monitoring_wells.show')
@section('show_content')
    <div class="card card-default">
        <div class="card-heading card-heading-transparent">
            <h2 class="card-title bold">{{ trans('messages.data_option') }}</h2>
        </div>
        <div class="card-block">
            <div class="form-group">
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <label class="radio">
                            <input name="optDataView" id="wt-by-year" value="wt-by-year" checked
                                   type="radio"><i></i>{{ trans('messages.by_year') }}
                        </label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <select class="form-control" id="wellWtYearSelector">
                            <option value="">--- {{ trans('messages.select_year') }} ---</option>
                            @foreach($wt_years as $wt_year)
                                <option>{{$wt_year->data_year}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <p></p>
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <label class="radio">
                            <input name="optDataView" id="wt-from-to-year" value="wt-from-to-year"
                                   type="radio"><i></i>{{ trans('messages.by_time_period') }}
                        </label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-sm-6">
                        <label>{{ trans('messages.from_year') }}</label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                            <input id="wellWtFromYearSelector" type="text" class="form-control datepicker" data-format="yyyy-mm-dd" data-lang="en" data-rtl="false">
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <label>{{ trans('messages.to_year') }}</label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                            <input id="wellWtToYearSelector" type="text" class="form-control datepicker" data-format="yyyy-mm-dd" data-lang="en" data-rtl="false">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <button type="button" class="btn btn-primary waves-effect waves-light pull-right"
                    id="drawWtFromToChart"
                    onclick="doWtData('{{$well->well_code}}')">
                <i class="fa fa-table"></i>&nbsp;{{ trans('messages.display_chart_data') }}
            </button>
        </div>
    </div>
    <div class="card card-default">
        <div class="card-heading card-heading-transparent">
            <h2 class="card-title bold">{{ trans('messages.chart') }}</h2>
        </div>
        <div class="card-block">
            <div id="water-temperature-chart">

            </div>
        </div>
    </div>
    <div class="card card-default">
        <div class="card-heading">
            <div id="dt-toolbox" class="pull-right">

            </div>

            <h2 class="card-title bold">{{ trans('messages.table_data') }}</h2>
        </div>
        <div class="card-block">
            <table id="gwt-db-table" class="table table-hover dataTable display">
                <thead>
                <tr>
                    <th>Thời gian</th>
                    <th>Nhiệt độ nước</th>
                </tr>
                </thead>
                <tfoot>
                <tr>
                    <th>Thời gian</th>
                    <th>Nhiệt độ nước</th>
                </tr>
                </tfoot>
            </table>
        </div>

    </div>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#wellWtYearSelector').trigger('change');
        });
    </script>
@endsection
