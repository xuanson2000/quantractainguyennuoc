@extends('admin.layouts.app')

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
                            <h4 class="pull-left mb-0">{{ trans('monitoring_networks.model_plural') }}</h4>
                            <h4 class="pull-right mt-0 mb-0">
                                <a class="btn btn-success waves-effect waves-light pull-right" href="{{ route('networks.network.create') }}" class="btn btn-success" title="{{ trans('monitoring_networks.create') }}">
                                    <i class="fa fa-plus" aria-hidden="true"></i> {{ trans('monitoring_networks.create') }}
                                 </a>
                            </h4>
                        </div>
                        @if(count($monitoringNetworks) == 0)
                            <div class="card-body">
                                 <h4>{{ trans('monitoring_networks.none_available') }}</h4>
                            </div>
                        @else
                            <div class="card-body">
                                <table class="table">
                                    <thead class="thead-default">
                                        <tr>
                                                                        <th>{{ trans('monitoring_networks.gid') }}</th>
                            <th>{{ trans('monitoring_networks.network_name') }}</th>
                            <th>{{ trans('monitoring_networks.network_code') }}</th>
                            <th>{{ trans('monitoring_networks.geom') }}</th>

                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($monitoringNetworks as $monitoringNetwork)
                                        <tr>
                                                                        <td>{{ $monitoringNetwork->gid }}</td>
                            <td>{{ $monitoringNetwork->network_name }}</td>
                            <td>{{ $monitoringNetwork->network_code }}</td>
                            <td>{{ $monitoringNetwork->geom }}</td>

                                             <td>
                                                 <form method="POST" action="{!! route('networks.network.destroy', $monitoringNetwork->gid) !!}" accept-charset="UTF-8">
                                                     <input name="_method" value="DELETE" type="hidden">
                                                     {{ csrf_field() }}
                                                      <div class="btn-group btn-group-xs pull-right" role="group">
                                                           <a href="{{ route('networks.network.show', $monitoringNetwork->gid ) }}" class="btn btn-info" title="{{ trans('monitoring_networks.show') }}">
                                                                <i class="fa fa-eye" aria-hidden="true"></i>
                                                           </a>
                                                           <a href="{{ route('networks.network.edit', $monitoringNetwork->gid ) }}" class="btn btn-primary" title="{{ trans('monitoring_networks.edit') }}">
                                                                <i class="fa fa-edit" aria-hidden="true"></i>
                                                           </a>

                                                           <button type="submit" class="btn btn-danger" title="{{ trans('monitoring_networks.delete') }}" onclick="return confirm(&quot;{{ trans('monitoring_networks.confirm_delete') }}&quot;)">
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
                                {!! $monitoringNetworks->render() !!}
                            </div>
                         @endif
                    </div>
                </div>
            </div>
    </div>
@endsection

