@extends('home.layouts.main')
@section('global_js')
    <script type="text/javascript">


    </script>
@endsection
@section('content')

    @if(Session::has('success_message'))
        <div class="alert alert-success alert-dismissible fade show">
            <span class="glyphicon glyphicon-ok"></span>
            {!! session('success_message') !!}

            <button type="button" class="close" data-dismiss="alert" aria-label="close">
                <span aria-hidden="true">&times;</span>
            </button>

        </div>
    @endif
    <div class="container mt-30">
        <div class="row">
            <div class="col-xl-2">
                <div class="side-nav">
                    <div class="side-nav-head">
                        <button class="fa fa-bars"></button>
                        <h4>LỌC DỮ LIỆU</h4>
                    </div>
                    <ul class="list-group list-group-bordered list-group-noicon">
                        <li class="list-group-item active">
                            <a class="dropdown-toggle" href="#">VÙNG QUAN TRẮC</a>
                            <ul style="display: block;">
                                @foreach($monitoring_networks as $network)
                                    @if($network->id == $id_active)
                                        <li class="active"><a
                                                    href="{{ route('wells.well.network', $network->id ) }}">{{$network->network_name}}</a>
                                        </li>
                                    @else
                                        <li>
                                            <a href="{{ route('wells.well.network', $network->id ) }}">{{$network->network_name}}</a>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-xl-10">
                <div class="card m-b-30">
                    <div class="card-header">
                        <h4 class="pull-left mb-0">{{ trans('tramdomuas.station_data') }}</h4>
                    </div>
                    @if(count($tramdomuas) == 0)
                        <div class="card-body">
                            <h4 class="card-title font-20 mt-0 text-center">{{ trans('tramdomuas.none_available') }}</h4>
                        </div>
                    @else
                        <div class="card-body">
                            <div class="table-responsive">

                                <table class="table">
                                    <thead class="thead-default">
                                    <tr>
                                        <th>{{ trans('tramdomuas.tentram') }}</th>
                                        <th>{{ trans('tramdomuas.x') }}</th>
                                        <th>{{ trans('tramdomuas.y') }}</th>
                                        <th>{{ trans('tramdomuas.tinh') }}</th>
                                        <th>{{ trans('tramdomuas.huyen') }}</th>
                                        <th>{{ trans('tramdomuas.xa') }}</th>
                                        <th>{{ trans('tramdomuas.sohieu') }}</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($tramdomuas as $tramdomua)
                                        <tr>
                                            <td>{{ $tramdomua->tentram }}</td>
                                            <td>{{ number_format($tramdomua->x, 2) }}</td>
                                            <td>{{ number_format($tramdomua->y, 2) }}</td>
                                            <td>{{ $tramdomua->tinh }}</td>
                                            <td>{{ $tramdomua->huyen }}</td>
                                            <td>{{ $tramdomua->xa }}</td>
                                            <td>{{ $tramdomua->sohieu }}</td>
                                            <td>
                                                <div class="btn-group btn-group-xs pull-right" role="group">
                                                    <a href="{{ route('tramdomuas.tramdomua.show', $tramdomua->gid ) }}"
                                                       class="btn btn-outline-info"
                                                       title="{{ trans('tramdomuas.show') }}">
                                                        <i class="fa fa-eye"
                                                           aria-hidden="true"></i>{{ trans('tramdomuas.detail') }}
                                                    </a>
                                                </div>

                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer">
                            {!! $tramdomuas->render() !!}
                        </div>
                    @endif
                </div>
            </div>


        </div>
    </div>
@endsection

