@extends('home.waste_waters.show')
@section('add_map_layer')
    <script type="text/javascript">
        var DiemXathai = L.tileLayer.wms('http://localhost:8080/geoserver/quantrac/wms', {
            layers: 'quantrac:xathai',
            attribution: mbAttr,
            transparent: true,
            format: 'image/png'
        }).addTo(map);
    </script>
@endsection
@section('show_content')
    <div class="heading-title heading-border-bottom">
        <h3>Bản đồ vị trí điểm xả thải</h3>
    </div>
    @include('home.maps.quickmap',['point'=>$wasteWater])
    <div class="heading-title heading-border-bottom">
        <h3>Thông tin chung</h3>
    </div>
    <div class="table-responsive mb-30">
        <table class="table table-hover mb-0">
            <tbody>
                <tr>
                    <td class="table-active">{{ trans('waste_waters.id_dks') }}</td>
                    <td>{{ $wasteWater->id_dks }}</td>
                </tr>
                <tr>
                    <td class="table-active">{{ trans('waste_waters.tennguonthai') }}</td>
                    <td>{{ $wasteWater->tennguonthai }}</td>
                </tr>
                <tr>
                    <td class="table-active">{{ trans('waste_waters.luuluong') }}</td>
                    <td>{{ $wasteWater->luuluong }}</td>
                </tr>
                <tr>
                    <td class="table-active">{{ trans('waste_waters.toado_x') }}</td>
                    <td>{{ number_format($wasteWater->gx, 2)}}</td>
                </tr>
                <tr>
                    <td class="table-active">{{ trans('waste_waters.toado_y') }}</td>
                    <td>{{ number_format($wasteWater->gy, 2)}}</td>
                </tr>
                <tr>
                    <td class="table-active">{{ trans('waste_waters.xt_tructiep') }}</td>
                    <td>{{$wasteWater->xt_tructiep}}</td>
                </tr>
                <tr>
                    <td class="table-active">{{ trans('waste_waters.xt_daxuly') }}</td>
                    <td>{{$wasteWater->xt_daxuly}}</td>
                </tr>
                <tr>
                    <td class="table-active">{{ trans('waste_waters.noitiepnhan') }}</td>
                    <td>{{$wasteWater->noitiepnhan}}</td>
                </tr>
                <tr>
                    <td class="table-active">{{ trans('waste_waters.dotrong') }}</td>
                    <td>{{$wasteWater->dotrong}}</td>
                </tr>
                <tr>
                    <td class="table-active">{{ trans('waste_waters.mau') }}</td>
                    <td>{{$wasteWater->mau}}</td>
                </tr>
                <tr>
                    <td class="table-active">{{ trans('waste_waters.mui') }}</td>
                    <td>{{$wasteWater->mui}}</td>
                </tr>
                <tr>
                    <td class="table-active">{{ trans('waste_waters.loaihinh') }}</td>
                    <td>{{$wasteWater->loaihinh}}</td>
                </tr>
                <tr>
                    <td class="table-active">{{ trans('waste_waters.sohieu_dks') }}</td>
                    <td>{{$wasteWater->sohieu_dks}}</td>
                </tr>

            </tbody>
        </table>
    </div>

@endsection
