@extends('home.tramdomua.show')
@section('show_content')
    <div class="heading-title heading-border-bottom">
        <h3>Bản đồ vị trí công trình</h3>
    </div>
    @include('home.maps.quickmap',['point'=>$tramdomua])
    <div class="heading-title heading-border-bottom">
        <h3>Thông tin chung</h3>
    </div>
    <div class="table-responsive mb-30">
        <table class="table table-hover mb-0">
            <tbody>
                <tr>
                <td class="table-active">{{ trans('tramdomuas.tt') }}</td>
                <td>{{ $tramdomua->tt }}</td>
            </tr>
            <tr>
                <td class="table-active">{{ trans('tramdomuas.tentram') }}</td>
                <td>{{ $tramdomua->tentram }}</td>
            </tr>
            <tr>
                <td class="table-active">{{ trans('tramdomuas.sohieu') }}</td>
                <td>{{ $tramdomua->sohieu }}</td>
            </tr>
            <tr>
                <td class="table-active">{{ trans('tramdomuas.diadanh') }}</td>
                <td>{{ $tramdomua->diadanh }}</td>
            </tr>
            <tr>
                <td class="table-active">{{ trans('tramdomuas.x') }}</td>
                <td>{{ number_format($tramdomua->x, 2)}}</td>
            </tr>
            <tr>
                <td class="table-active">{{ trans('tramdomuas.y') }}</td>
                <td>{{ number_format($tramdomua->y, 2)}}</td>
            </tr>
            <tr>
                <td class="table-active">{{ trans('tramdomuas.tinh') }}</td>
                <td>{{$tramdomua->tinh}}</td>
            </tr>
            <tr>
                <td class="table-active">{{ trans('tramdomuas.huyen') }}</td>
                <td>{{$tramdomua->huyen}}</td>
            </tr>
            <tr>
                <td class="table-active">{{ trans('tramdomuas.xa') }}</td>
                <td>{{$tramdomua->xa}}</td>
            </tr>
            <tr>
                <td class="table-active">{{ trans('tramdomuas.ghichu') }}</td>
                <td>{{$tramdomua->ghichu}}</td>
            </tr>
            <tr>
                <td class="table-active">{{ trans('tramdomuas.mota') }}</td>
                <td>{{$tramdomua->mota}}</td>
            </tr>
            </tbody>
        </table>
    </div>

@endsection
