@extends('home.meteorology_stations.show')
@section('show_content')
    <div class="heading-title heading-border-bottom">
        <h3>Bản đồ vị trí công trình</h3>
    </div>
    @include('home.maps.quickmap',['point'=>$meteorologyStation])
    <div class="heading-title heading-border-bottom">
        <h3>Thông tin chung</h3>
    </div>
    <div class="table-responsive mb-30">
        <table class="table table-hover mb-0">
            <tbody>
                <tr>
                <td class="table-active">{{ trans('meteorology_stations.matram') }}</td>
                <td>{{ $meteorologyStation->matram }}</td>
            </tr>
            <tr>
                <td class="table-active">{{ trans('meteorology_stations.tentram') }}</td>
                <td>{{ $meteorologyStation->tentram }}</td>
            </tr>
            <tr>
                <td class="table-active">{{ trans('meteorology_stations.diadanh') }}</td>
                <td>{{ $meteorologyStation->diadanh }}</td>
            </tr>
            <tr>
                <td class="table-active">{{ trans('meteorology_stations.tentinh') }}</td>
                <td>{{ $meteorologyStation->tentinh }}</td>
            </tr>
            <tr>
                <td class="table-active">{{ trans('meteorology_stations.toadox') }}</td>
                <td>{{ number_format($meteorologyStation->gx, 2)}}</td>
            </tr>
            <tr>
                <td class="table-active">{{ trans('meteorology_stations.toadoy') }}</td>
                <td>{{ number_format($meteorologyStation->gy, 2)}}</td>
            </tr>
            <tr>
                <td class="table-active">{{ trans('meteorology_stations.loai') }}</td>
                <td>{{$meteorologyStation->loai}}</td>
            </tr>
            <tr>
                <td class="table-active">{{ trans('meteorology_stations.bucxa') }}</td>
                <td>{{$meteorologyStation->bucxa}}</td>
            </tr>
            <tr>
                <td class="table-active">{{ trans('meteorology_stations.ktnn') }}</td>
                <td>{{$meteorologyStation->ktnn}}</td>
            </tr>
            <tr>
                <td class="table-active">{{ trans('meteorology_stations.giamsatbdk') }}</td>
                <td>{{$meteorologyStation->giamsatbdk}}</td>
            </tr>
            <tr>
                <td class="table-active">{{ trans('meteorology_stations.qtkttc') }}</td>
                <td>{{$meteorologyStation->qtkttc}}</td>
            </tr>
                <tr>
                    <td class="table-active">{{ trans('meteorology_stations.tkvt') }}</td>
                    <td>{{$meteorologyStation->tkvt}}</td>
                </tr>
                <tr>
                    <td class="table-active">{{ trans('meteorology_stations.pilotdogiotrencao') }}</td>
                    <td>{{$meteorologyStation->pilotdogiotrencao}}</td>
                </tr>
                <tr>
                    <td class="table-active">{{ trans('meteorology_stations.ozonbxct') }}</td>
                    <td>{{$meteorologyStation->ozonbxct}}</td>
                </tr>
                <tr>
                    <td class="table-active">{{ trans('meteorology_stations.radathoitiet') }}</td>
                    <td>{{$meteorologyStation->radathoitiet}}</td>
                </tr>
                <tr>
                    <td class="table-active">{{ trans('meteorology_stations.dinhviset') }}</td>
                    <td>{{$meteorologyStation->dinhviset}}</td>
                </tr>
                <tr>
                    <td class="table-active">{{ trans('meteorology_stations.dogiocatlop') }}</td>
                    <td>{{$meteorologyStation->dogiocatlop}}</td>
                </tr>
                <tr>
                    <td class="table-active">{{ trans('meteorology_stations.qtmthienco') }}</td>
                    <td>{{$meteorologyStation->qtmthienco}}</td>
                </tr>
                <tr>
                    <td class="table-active">{{ trans('meteorology_stations.qtmtquyhoach') }}</td>
                    <td>{{$meteorologyStation->qtmtquyhoach}}</td>
                </tr>
            </tbody>
        </table>
    </div>

@endsection
