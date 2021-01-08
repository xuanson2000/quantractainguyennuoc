@extends('home.surfacewater_stations.show')
@section('add_map_layer')
    <script type="text/javascript">
        var SurfaceWater_Station = L.tileLayer.wms('http://localhost:8080/geoserver/quantrac/wms', {
            layers: 'quantrac:surfacewater_station',
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
    @include('home.maps.quickmap',['point'=>$station])
    <div class="heading-title heading-border-bottom">
        <h3>Thông tin chung</h3>
    </div>
    <div class="table-responsive mb-30">
        <table class="table table-hover mb-0">
            <tbody>
            <tr>
                <td class="table-active">{{ trans('surfacewater_stations.station_name') }}</td>
                <td>{{$station->tentram}}</td>
            </tr>
            <tr>
                <td class="table-active">{{ trans('surfacewater_stations.station_x') }}</td>
                <td>{{ number_format($station->st_x, 2)}}</td>
            </tr>
            <tr>
                <td class="table-active">{{ trans('surfacewater_stations.station_y') }}</td>
                <td>{{ number_format($station->st_y, 2)}}</td>
            </tr>
            <tr>
                <td class="table-active">{{ trans('surfacewater_stations.station_z') }}</td>
                <td>{{$station->docaoz}}</td>
            </tr>
            <tr>
                <td class="table-active">{{ trans('surfacewater_stations.province') }}</td>
                <td>{{$station->tinh}}</td>
            </tr>
            <tr>
                <td class="table-active">{{ trans('surfacewater_stations.district') }}</td>
                <td>{{$station->huyen}}</td>
            </tr>
            <tr>
                <td class="table-active">{{ trans('surfacewater_stations.commune') }}</td>
                <td>{{$station->xa}}</td>
            </tr>
            <tr>
                <td class="table-active">{{ trans('surfacewater_stations.thongsoqt') }}</td>
                <td>{{$station->thongsoqt}}</td>
            </tr>
            <tr>
                <td class="table-active">{{ trans('surfacewater_stations.tensong') }}</td>
                <td>{{$station->tensong}}</td>
            </tr>
            <tr>
                <td class="table-active">{{ trans('surfacewater_stations.luuvucsong') }}</td>
                <td>{{$station->luuvucsong}}</td>
            </tr>

            <tr>
                <td class="table-active">{{ trans('surfacewater_stations.dientichtn') }}</td>
                <td>{{$station->dientichtn}}</td>
            </tr>
            <tr>
                <td class="table-active">{{ trans('surfacewater_stations.capquanly') }}</td>
                <td>{{$station->capquanly}}</td>
            </tr>
            <tr>
                <td class="table-active">{{ trans('surfacewater_stations.description') }}</td>
                <td>{{$station->mota}}</td>
            </tr>
            </tbody>
        </table>
    </div>

@endsection
