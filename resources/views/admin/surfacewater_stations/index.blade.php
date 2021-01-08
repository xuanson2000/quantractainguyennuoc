@extends('layouts.app')

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
    <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card m-b-30">
                        <div class="card-header">
                            <h4 class="pull-left mb-0">{{ trans('surfacewater_stations.model_plural') }}</h4>
                            <h4 class="pull-right mt-0 mb-0">
                                <a class="btn btn-success waves-effect waves-light pull-right" href="{{ route('surfacewater_stations.surfacewater_station.create') }}" class="btn btn-success" title="{{ trans('surfacewater_stations.create') }}">
                                    <i class="fa fa-plus" aria-hidden="true"></i> {{ trans('surfacewater_stations.create') }}
                                 </a>
                            </h4>
                        </div>
                        @if(count($surfacewaterStations) == 0)
                            <div class="card-body">
                                 <h4>{{ trans('surfacewater_stations.none_available') }}</h4>
                            </div>
                        @else
                            <div class="card-body">
                                <table class="table">
                                    <thead class="thead-default">
                                        <tr>
                                                                        <th>{{ trans('surfacewater_stations.gid') }}</th>
                            <th>{{ trans('surfacewater_stations.matram') }}</th>
                            <th>{{ trans('surfacewater_stations.tentram') }}</th>
                            <th>{{ trans('surfacewater_stations.tensong') }}</th>
                            <th>{{ trans('surfacewater_stations.luuvucsong') }}</th>
                            <th>{{ trans('surfacewater_stations.xa') }}</th>
                            <th>{{ trans('surfacewater_stations.huyen') }}</th>
                            <th>{{ trans('surfacewater_stations.tinh') }}</th>
                            <th>{{ trans('surfacewater_stations.toadox') }}</th>
                            <th>{{ trans('surfacewater_stations.toadoy') }}</th>
                            <th>{{ trans('surfacewater_stations.dientichtn') }}</th>
                            <th>{{ trans('surfacewater_stations.thongsoqt') }}</th>
                            <th>{{ trans('surfacewater_stations.geom') }}</th>
                            <th>{{ trans('surfacewater_stations.ngayqt') }}</th>
                            <th>{{ trans('surfacewater_stations.capquanly') }}</th>
                            <th>{{ trans('surfacewater_stations.mota') }}</th>
                            <th>{{ trans('surfacewater_stations.docaoz') }}</th>

                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($surfacewaterStations as $surfacewaterStation)
                                        <tr>
                                                                        <td>{{ $surfacewaterStation->gid }}</td>
                            <td>{{ $surfacewaterStation->matram }}</td>
                            <td>{{ $surfacewaterStation->tentram }}</td>
                            <td>{{ $surfacewaterStation->tensong }}</td>
                            <td>{{ $surfacewaterStation->luuvucsong }}</td>
                            <td>{{ $surfacewaterStation->xa }}</td>
                            <td>{{ $surfacewaterStation->huyen }}</td>
                            <td>{{ $surfacewaterStation->tinh }}</td>
                            <td>{{ $surfacewaterStation->toadox }}</td>
                            <td>{{ $surfacewaterStation->toadoy }}</td>
                            <td>{{ $surfacewaterStation->dientichtn }}</td>
                            <td>{{ $surfacewaterStation->thongsoqt }}</td>
                            <td>{{ $surfacewaterStation->geom }}</td>
                            <td>{{ $surfacewaterStation->ngayqt }}</td>
                            <td>{{ $surfacewaterStation->capquanly }}</td>
                            <td>{{ $surfacewaterStation->mota }}</td>
                            <td>{{ ($surfacewaterStation->docaoz) ? 'Yes' : 'No' }}</td>

                                             <td>
                                                 <form method="POST" action="{!! route('surfacewater_stations.surfacewater_station.destroy', $surfacewaterStation->gid) !!}" accept-charset="UTF-8">
                                                     <input name="_method" value="DELETE" type="hidden">
                                                     {{ csrf_field() }}
                                                      <div class="btn-group btn-group-xs pull-right" role="group">
                                                           <a href="{{ route('surfacewater_stations.surfacewater_station.show', $surfacewaterStation->gid ) }}" class="btn btn-info" title="{{ trans('surfacewater_stations.show') }}">
                                                                <i class="fa fa-eye" aria-hidden="true"></i>
                                                           </a>
                                                           <a href="{{ route('surfacewater_stations.surfacewater_station.edit', $surfacewaterStation->gid ) }}" class="btn btn-primary" title="{{ trans('surfacewater_stations.edit') }}">
                                                                <i class="fa fa-edit" aria-hidden="true"></i>
                                                           </a>

                                                           <button type="submit" class="btn btn-danger" title="{{ trans('surfacewater_stations.delete') }}" onclick="return confirm(&quot;{{ trans('surfacewater_stations.confirm_delete') }}&quot;)">
                                                                <i class="fa fa-trash-o" aria-hidden="true"></i>
                                                           </button>
                                                      </div>

                                                 </form>

                                             </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="card-footer">
                                {!! $surfacewaterStations->render() !!}
                            </div>
                         @endif
                    </div>
                </div>
            </div>
    </div>
@endsection

