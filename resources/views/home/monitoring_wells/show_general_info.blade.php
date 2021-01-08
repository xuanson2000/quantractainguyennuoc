@extends('home.monitoring_wells.show')
@section('add_map_layer')
    <script type="text/javascript">
        var Mornitoring_well = L.tileLayer.wms('http://localhost:8080/geoserver/quantrac/wms', {
            layers: 'quantrac:monitoring_well',
            attribution: mbAttr,
            transparent: true,
            format: 'image/png'
        }).addTo(map);
    </script>
@endsection
@section('show_content')
    <div class="heading-title heading-border-bottom">
        <h3>Bản đồ vị trí công trình</h3>
    </div>
    @include('home.maps.quickmap',['point'=>$well])
    <div class="heading-title heading-border-bottom">
        <h3>{{ trans('wells.well_general_info') }}</h3>
    </div>
    <div class="table-responsive mb-30">
        <table class="table table-hover mb-0">
            <tbody>
            <tr>
                <td class="w-50p table-active">{{ trans('wells.well_name') }}</td>
                <td>{{$well->well_code}}</td>
            </tr>
            <tr>
                <td class="w-50p table-active">{{ trans('wells.monitoring_region') }}</td>
                <td>{{$well->id_monitoring_network}}</td>
            </tr>
            <tr>
                <td class="w-50p table-active">{{ trans('wells.monitoring_line') }}</td>
                <td>{{$well->id_monitoring_line}}</td>
            </tr>
            <tr>
                <td class="w-50p table-active">{{ trans('wells.water_layer') }}</td>
                <td>{{$well->water_layer}}</td>
            </tr>
            <tr>
                <td class="w-50p table-active">{{ trans('wells.start_date') }}</td>
                <td>{{$well->start_date}}</td>
            </tr>
            </tbody>
        </table>
    </div>
    <div class="heading-title heading-border-bottom">
        <h3>{{ trans('wells.well_location') }}</h3>
    </div>
    <div class="table-responsive mb-30">
        <table class="table table-hover mb-0">
            <tbody>
            <tr>
                <td class="w-50p table-active">{{ trans('wells.well_x') }}</td>
                <td>{{ number_format($well->st_x, 2)}}</td>
            </tr>
            <tr>
                <td class="w-50p table-active">{{ trans('wells.well_y') }}</td>
                <td>{{ number_format($well->st_y, 2)}}</td>
            </tr>
            <tr>
                <td class="w-50p table-active">{{ trans('wells.elevation') }}</td>
                <td>{{$well->elevation}}</td>
            </tr>
            <tr>
                <td class="w-50p table-active">{{ trans('wells.province') }}</td>
                <td>{{$well->province}}</td>
            </tr>
            <tr>
                <td class="w-50p table-active">{{ trans('wells.district') }}</td>
                <td>{{$well->district}}</td>
            </tr>
            <tr>
                <td class="w-50p table-active">{{ trans('wells.commune') }}</td>
                <td>{{$well->commune}}</td>
            </tr>
            </tbody>
        </table>
    </div>
    <div class="heading-title heading-border-bottom">
        <h3>{{ trans('wells.well_monitoring_parameter') }}</h3>
    </div>
    <div class="table-responsive mb-30">
        <table class="table table-hover mb-0">
            <tbody>
            <tr>
                <td class="w-50p table-active">{{ trans('wells.monitor_meteo') }}</td>
                <td>{{$well->monitor_meteo}}</td>
            </tr>
            <tr>
                <td class="w-50p table-active">{{ trans('wells.monitor_hydro') }}</td>
                <td>{{$well->monitor_hydro}}</td>
            </tr>
            <tr>
                <td class="w-50p table-active">{{ trans('wells.monitor_level') }}</td>
                <td>{{$well->monitor_level}}</td>
            </tr>
            <tr>
                <td class="w-50p table-active">{{ trans('wells.monitor_water_flow') }}</td>
                <td>{{$well->monitor_water_flow}}</td>
            </tr>
            <tr>
                <td class="w-50p table-active">{{ trans('wells.monitor_templature') }}</td>
                <td>{{$well->monitor_templature}}</td>
            </tr>
            <tr>
                <td class="w-50p table-active">{{ trans('wells.monitor_chemistry') }}</td>
                <td>{{$well->monitor_chemistry}}</td>
            </tr>
            </tbody>
        </table>
    </div>
    <div class="heading-title heading-border-bottom">
        <h3>{{ trans('wells.well_hydrology_parameter') }}</h3>
    </div>
    <div class="table-responsive mb-30">
        <table class="table table-hover mb-0">
            <tbody>
            <tr>
                <td class="w-50p table-active">{{ trans('wells.static_water_level') }}</td>
                <td>{{$well->static_water_level}}</td>
            </tr>
            <tr>
                <td class="w-50p table-active">{{ trans('wells.water_flow') }}</td>
                <td>{{$well->water_flow}}</td>
            </tr>
            <tr>
                <td class="w-50p table-active">{{ trans('wells.drawdown') }}</td>
                <td>{{$well->drawdown}}</td>
            </tr>
            <tr>
                <td class="w-50p table-active">{{ trans('wells.water_flow_coeff') }}</td>
                <td>{{$well->water_flow_coeff}}</td>
            </tr>
            <tr>
                <td class="w-50p table-active">{{ trans('wells.coeff_k') }}</td>
                <td>{{$well->coeff_k}}</td>
            </tr>
            <tr>
                <td class="w-50p table-active">{{ trans('wells.coeff_km') }}</td>
                <td>{{$well->coeff_km}}</td>
            </tr>
            <tr>
                <td class="w-50p table-active">{{ trans('wells.coeff_a') }}</td>
                <td>{{$well->coeff_a}}</td>
            </tr>
            <tr>
                <td class="w-50p table-active">{{ trans('wells.coeff_muy') }}</td>
                <td>{{$well->coeff_muy}}</td>
            </tr>
            </tbody>
        </table>
    </div>

@endsection
