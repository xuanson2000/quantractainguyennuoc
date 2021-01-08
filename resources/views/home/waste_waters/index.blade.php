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
                                                    href="#">{{$network->network_name}}</a>
                                        </li>
                                    @else
                                        <li>
                                            <a href="#">{{$network->network_name}}</a>
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
                        <h4 class="pull-left mb-0">{{ trans('waste_waters.station_list') }}</h4>
                    </div>
                    @if(count($wasteWaters) == 0)
                        <div class="card-body">
                            <h4 class="card-title font-20 mt-0 text-center">{{ trans('waste_waters.none_available') }}</h4>
                        </div>
                    @else
                        <div class="card-body">
                            <div class="table-responsive">

                                <table class="table">
                                    <thead class="thead-default">
                                    <tr>
                                        <th>{{ trans('waste_waters.sohieu_dks') }}</th>
                                        <th>{{ trans('waste_waters.tennguonthai') }}</th>
                                        <th>{{ trans('waste_waters.toado_x') }}</th>
                                        <th>{{ trans('waste_waters.toado_y') }}</th>
                                        <th>{{ trans('waste_waters.luuluong') }}</th>
                                        <th>{{ trans('waste_waters.loaihinh') }}</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($wasteWaters as $wasteWater)
                                        <tr>
                                            <td>{{ $wasteWater->sohieu_dks }}</td>
                                            <td>{{ $wasteWater->tennguonthai }}</td>
                                            <td>{{ number_format($wasteWater->gx, 2) }}</td>
                                            <td>{{ number_format($wasteWater->gy, 2) }}</td>
                                            <td>{{ $wasteWater->luuluong }}</td>
                                            <td>{{ $wasteWater->loaihinh }}</td>
                                            <td>
                                                <div class="btn-group btn-group-xs pull-right" role="group">
                                                    <a href="{{ route('waste_waters.waste_water.show', $wasteWater->xt_id ) }}"
                                                       class="btn btn-outline-info"
                                                       title="{{ trans('waste_waters.show') }}">
                                                        <i class="fa fa-eye"
                                                           aria-hidden="true"></i>{{ trans('waste_waters.detail') }}
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
                            {!! $wasteWaters->render() !!}
                        </div>
                    @endif
                </div>
            </div>


        </div>
    </div>
@endsection

