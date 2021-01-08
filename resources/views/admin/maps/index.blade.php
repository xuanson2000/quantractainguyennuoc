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
                            <h4 class="pull-left mb-0">{{ trans('maps.model_plural') }}</h4>
                            <h4 class="pull-right mt-0 mb-0">
                                <a class="btn btn-success waves-effect waves-light pull-right" href="{{ route('maps.map.create') }}" class="btn btn-success" title="{{ trans('maps.create') }}">
                                    <i class="fa fa-plus" aria-hidden="true"></i> {{ trans('maps.create') }}
                                 </a>
                            </h4>
                        </div>
                        @if(count($maps) == 0)
                            <div class="card-body">
                                 <h4>{{ trans('maps.none_available') }}</h4>
                            </div>
                        @else
                            <div class="card-body">
                                <table class="table">
                                    <thead class="thead-default">
                                        <tr>
                                                                        <th>{{ trans('maps.map_name') }}</th>
                            <th>{{ trans('maps.map_title') }}</th>
                            <th>{{ trans('maps.map_abstract') }}</th>
                            <th>{{ trans('maps.status') }}</th>
                            <th>{{ trans('maps.unit') }}</th>
                            <th>{{ trans('maps.proj') }}</th>

                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($maps as $map)
                                        <tr>
                                                                        <td>{{ $map->map_name }}</td>
                            <td>{{ $map->map_title }}</td>
                            <td>{{ $map->map_abstract }}</td>
                            <td>{{ ($map->status) ? 'Yes' : 'No' }}</td>
                            <td>{{ $map->unit }}</td>
                            <td>{{ optional($map->proj)->srid }}</td>

                                             <td>
                                                 <form method="POST" action="{!! route('maps.map.destroy', $map->id) !!}" accept-charset="UTF-8">
                                                     <input name="_method" value="DELETE" type="hidden">
                                                     {{ csrf_field() }}
                                                      <div class="btn-group btn-group-xs pull-right" role="group">
                                                           <a href="{{ route('maps.map.view', $map->id ) }}" class="btn btn-info" title="{{ trans('maps.view') }}">
                                                               <i class="fa fa-desktop" aria-hidden="true"></i>
                                                           </a>
                                                           <a href="{{ route('maps.map.show', $map->id ) }}" class="btn btn-info" title="{{ trans('maps.show') }}">
                                                                <i class="fa fa-eye" aria-hidden="true"></i>
                                                           </a>
                                                           <a href="{{ route('maps.map.edit', $map->id ) }}" class="btn btn-primary" title="{{ trans('maps.edit') }}">
                                                                <i class="fa fa-edit" aria-hidden="true"></i>
                                                           </a>

                                                           <button type="submit" class="btn btn-danger" title="{{ trans('maps.delete') }}" onclick="return confirm(&quot;{{ trans('maps.confirm_delete') }}&quot;)">
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
                                {!! $maps->render() !!}
                            </div>
                         @endif
                    </div>
                </div>
            </div>
    </div>
@endsection

