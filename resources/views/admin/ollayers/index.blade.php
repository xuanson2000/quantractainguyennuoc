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
                            <h4 class="pull-left mb-0">{{ trans('ollayers.model_plural') }}</h4>
                            <h4 class="pull-right mt-0 mb-0">
                                <a class="btn btn-success waves-effect waves-light pull-right" href="{{ route('ollayers.ollayer.create') }}" class="btn btn-success" title="{{ trans('ollayers.create') }}">
                                    <i class="fa fa-plus" aria-hidden="true"></i> {{ trans('ollayers.create') }}
                                 </a>
                            </h4>
                        </div>
                        @if(count($ollayers) == 0)
                            <div class="card-body">
                                 <h4>{{ trans('ollayers.none_available') }}</h4>
                            </div>
                        @else
                            <div class="card-body">
                                <table class="table">
                                    <thead class="thead-default">
                                        <tr>
                                                                        <th>{{ trans('ollayers.id') }}</th>
                            <th>{{ trans('ollayers.map_id') }}</th>
                            <th>{{ trans('ollayers.group_id') }}</th>
                            <th>{{ trans('ollayers.layer_name') }}</th>
                            <th>{{ trans('ollayers.layer_title') }}</th>
                            <th>{{ trans('ollayers.opacity') }}</th>
                            <th>{{ trans('ollayers.visible') }}</th>

                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($ollayers as $ollayer)
                                        <tr>
                                                                        <td>{{ $ollayer->id }}</td>
                            <td>{{ optional($ollayer->map_id)->map_name }}</td>
                            <td>{{ optional($ollayer->group_id)->group_name }}</td>
                            <td>{{ $ollayer->layer_name }}</td>
                            <td>{{ $ollayer->layer_title }}</td>
                            <td>{{ $ollayer->opacity }}</td>
                            <td>{{ ($ollayer->visible) ? 'Yes' : 'No' }}</td>

                                             <td>
                                                 <form method="POST" action="{!! route('ollayers.ollayer.destroy', $ollayer->id) !!}" accept-charset="UTF-8">
                                                     <input name="_method" value="DELETE" type="hidden">
                                                     {{ csrf_field() }}
                                                      <div class="btn-group btn-group-xs pull-right" role="group">
                                                           <a href="{{ route('ollayers.ollayer.show', $ollayer->id ) }}" class="btn btn-info" title="{{ trans('ollayers.show') }}">
                                                                <i class="fa fa-eye" aria-hidden="true"></i>
                                                           </a>
                                                           <a href="{{ route('ollayers.ollayer.edit', $ollayer->id ) }}" class="btn btn-primary" title="{{ trans('ollayers.edit') }}">
                                                                <i class="fa fa-edit" aria-hidden="true"></i>
                                                           </a>

                                                           <button type="submit" class="btn btn-danger" title="{{ trans('ollayers.delete') }}" onclick="return confirm(&quot;{{ trans('ollayers.confirm_delete') }}&quot;)">
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
                                {!! $ollayers->render() !!}
                            </div>
                         @endif
                    </div>
                </div>
            </div>
    </div>
@endsection

