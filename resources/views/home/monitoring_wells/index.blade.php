@extends('home.layouts.main')
@section('global_js')
    <script type="text/javascript">


    </script>
@endsection
@section('content')
        <div class="container mt-30">
            <div class="row">
                <div class="col-xl-3">
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
                                            <li class="active"><a href="{{ route('wells.well.network', $network->id ) }}">{{$network->network_name}}</a></li>
                                        @else
                                            <li><a href="{{ route('wells.well.network', $network->id ) }}">{{$network->network_name}}</a></li>
                                        @endif
                                    @endforeach
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-9">
                    <div class="card m-b-30">
                        <div class="card-header">
                            <h4 class="pull-left mb-0">{{ trans('wells.well_data') }}</h4>
                        </div>
                        @if(count($wells) == 0)
                            <div class="card-body">
                                <h4 class="card-title font-20 mt-0 text-center">{{ trans('wells.none_available') }}</h4>
                            </div>
                        @else
                            <div class="card-body">
                                <div class="table-responsive">

                                    <table class="table">
                                        <thead class="thead-default">
                                        <tr>
                                            <th>{{ trans('wells.well_name') }}</th>
                                            <th>{{ trans('wells.well_x') }}</th>
                                            <th>{{ trans('wells.well_y') }}</th>
                                            <th>{{ trans('wells.province') }}</th>
                                            <th>{{ trans('wells.district') }}</th>
                                            <th>{{ trans('wells.commune') }}</th>
                                            <th>{{ trans('wells.monitoring_region') }}</th>
                                            <th>{{ trans('wells.water_layer') }}</th>
                                            <th></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($wells as $well)
                                            <tr>
                                                <td>{{ $well->well_code }}</td>
                                                <td>{{ number_format($well->st_x, 2)}}</td>
                                                <td>{{ number_format($well->st_y, 2) }}</td>
                                                <td>{{ $well->province }}</td>
                                                <td>{{ $well->district }}</td>
                                                <td>{{ $well->commune }}</td>
                                                <td>{{ $well->id_monitoring_network }}</td>
                                                <td>{{ $well->water_layer }}</td>
                                                <td>
                                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                                        <a href="{{ route('wells.well.show', $well->id ) }}"
                                                           class="btn btn-outline-info"
                                                           title="{{ trans('wells.detail') }}">
                                                            <i class="fa fa-eye"
                                                               aria-hidden="true"></i>{{ trans('wells.detail') }}
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
                                {!! $wells->render() !!}
                            </div>
                        @endif
                    </div>
                </div>

            </div>
        </div>
@endsection
