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
                            <h4 class="pull-left mb-0">{{ trans('tramdomuas.model_plural') }}</h4>
                            <h4 class="pull-right mt-0 mb-0">
                                <a class="btn btn-success waves-effect waves-light pull-right" href="{{ route('tramdomuas.tramdomua.create') }}" class="btn btn-success" title="{{ trans('tramdomuas.create') }}">
                                    <i class="fa fa-plus" aria-hidden="true"></i> {{ trans('tramdomuas.create') }}
                                 </a>
                            </h4>
                        </div>
                        @if(count($tramdomuas) == 0)
                            <div class="card-body">
                                 <h4>{{ trans('tramdomuas.none_available') }}</h4>
                            </div>
                        @else
                            <div class="card-body">
                                <table class="table">
                                    <thead class="thead-default">
                                        <tr>
                                                                        <th>{{ trans('tramdomuas.gid') }}</th>
                            <th>{{ trans('tramdomuas.tt') }}</th>
                            <th>{{ trans('tramdomuas.tentram') }}</th>
                            <th>{{ trans('tramdomuas.diadanh') }}</th>
                            <th>{{ trans('tramdomuas.x') }}</th>
                            <th>{{ trans('tramdomuas.y') }}</th>
                            <th>{{ trans('tramdomuas.geom') }}</th>
                            <th>{{ trans('tramdomuas.tinh') }}</th>
                            <th>{{ trans('tramdomuas.huyen') }}</th>
                            <th>{{ trans('tramdomuas.xa') }}</th>
                            <th>{{ trans('tramdomuas.ghichu') }}</th>
                            <th>{{ trans('tramdomuas.sohieu') }}</th>
                            <th>{{ trans('tramdomuas.mota') }}</th>

                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($tramdomuas as $tramdomua)
                                        <tr>
                                                                        <td>{{ $tramdomua->gid }}</td>
                            <td>{{ $tramdomua->tt }}</td>
                            <td>{{ $tramdomua->tentram }}</td>
                            <td>{{ $tramdomua->diadanh }}</td>
                            <td>{{ $tramdomua->x }}</td>
                            <td>{{ $tramdomua->y }}</td>
                            <td>{{ $tramdomua->geom }}</td>
                            <td>{{ $tramdomua->tinh }}</td>
                            <td>{{ $tramdomua->huyen }}</td>
                            <td>{{ $tramdomua->xa }}</td>
                            <td>{{ $tramdomua->ghichu }}</td>
                            <td>{{ $tramdomua->sohieu }}</td>
                            <td>{{ $tramdomua->mota }}</td>

                                             <td>
                                                 <form method="POST" action="{!! route('tramdomuas.tramdomua.destroy', $tramdomua->gid) !!}" accept-charset="UTF-8">
                                                     <input name="_method" value="DELETE" type="hidden">
                                                     {{ csrf_field() }}
                                                      <div class="btn-group btn-group-xs pull-right" role="group">
                                                           <a href="{{ route('tramdomuas.tramdomua.show', $tramdomua->gid ) }}" class="btn btn-info" title="{{ trans('tramdomuas.show') }}">
                                                                <i class="fa fa-eye" aria-hidden="true"></i>
                                                           </a>
                                                           <a href="{{ route('tramdomuas.tramdomua.edit', $tramdomua->gid ) }}" class="btn btn-primary" title="{{ trans('tramdomuas.edit') }}">
                                                                <i class="fa fa-edit" aria-hidden="true"></i>
                                                           </a>

                                                           <button type="submit" class="btn btn-danger" title="{{ trans('tramdomuas.delete') }}" onclick="return confirm(&quot;{{ trans('tramdomuas.confirm_delete') }}&quot;)">
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
                                {!! $tramdomuas->render() !!}
                            </div>
                         @endif
                    </div>
                </div>
            </div>
    </div>
@endsection

