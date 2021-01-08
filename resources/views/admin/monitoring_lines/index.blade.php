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
                            <h4 class="pull-left mb-0">{{ trans('monitoring_lines.model_plural') }}</h4>
                            <h4 class="pull-right mt-0 mb-0">
                                <a class="btn btn-success waves-effect waves-light pull-right" href="{{ route('monitoring_lines.monitoring_line.create') }}" class="btn btn-success" title="{{ trans('monitoring_lines.create') }}">
                                    <i class="fa fa-plus" aria-hidden="true"></i> {{ trans('monitoring_lines.create') }}
                                 </a>
                            </h4>
                        </div>
                        @if(count($monitoringLines) == 0)
                            <div class="card-body">
                                 <h4>{{ trans('monitoring_lines.none_available') }}</h4>
                            </div>
                        @else
                            <div class="card-body">
                                <table class="table">
                                    <thead class="thead-default">
                                        <tr>
                                                                        <th>{{ trans('monitoring_lines.gid') }}</th>
                            <th>{{ trans('monitoring_lines.line_name') }}</th>
                            <th>{{ trans('monitoring_lines.id_network') }}</th>
                            <th>{{ trans('monitoring_lines.geom') }}</th>

                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($monitoringLines as $monitoringLine)
                                        <tr>
                                                                        <td>{{ $monitoringLine->gid }}</td>
                            <td>{{ $monitoringLine->line_name }}</td>
                            <td>{{ $monitoringLine->id_network }}</td>
                            <td>{{ $monitoringLine->geom }}</td>

                                             <td>
                                                 <form method="POST" action="{!! route('monitoring_lines.monitoring_line.destroy', $monitoringLine->gid) !!}" accept-charset="UTF-8">
                                                     <input name="_method" value="DELETE" type="hidden">
                                                     {{ csrf_field() }}
                                                      <div class="btn-group btn-group-xs pull-right" role="group">
                                                           <a href="{{ route('monitoring_lines.monitoring_line.show', $monitoringLine->gid ) }}" class="btn btn-info" title="{{ trans('monitoring_lines.show') }}">
                                                                <i class="fa fa-eye" aria-hidden="true"></i>
                                                           </a>
                                                           <a href="{{ route('monitoring_lines.monitoring_line.edit', $monitoringLine->gid ) }}" class="btn btn-primary" title="{{ trans('monitoring_lines.edit') }}">
                                                                <i class="fa fa-edit" aria-hidden="true"></i>
                                                           </a>

                                                           <button type="submit" class="btn btn-danger" title="{{ trans('monitoring_lines.delete') }}" onclick="return confirm(&quot;{{ trans('monitoring_lines.confirm_delete') }}&quot;)">
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
                                {!! $monitoringLines->render() !!}
                            </div>
                         @endif
                    </div>
                </div>
            </div>
    </div>
@endsection

