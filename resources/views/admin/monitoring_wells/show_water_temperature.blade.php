@extends('home.monitoring_wells.show')
@section('show_content')
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
    <script type="text/javascript">
        $(document).ready(function () {
            $('#wellWtYearSelector').trigger('change');
        });
    </script>
@endsection
