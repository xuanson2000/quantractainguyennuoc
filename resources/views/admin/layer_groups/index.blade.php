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
                            <h4 class="pull-left mb-0">{{ trans('layer_groups.model_plural') }}</h4>
                            <h4 class="pull-right mt-0 mb-0">
                                <a class="btn btn-success waves-effect waves-light pull-right" href="{{ route('layer_groups.layer_group.create') }}" class="btn btn-success" title="{{ trans('layer_groups.create') }}">
                                    <i class="fa fa-plus" aria-hidden="true"></i> {{ trans('layer_groups.create') }}
                                 </a>
                            </h4>
                        </div>
                        @if(count($layerGroups) == 0)
                            <div class="card-body">
                                 <h4>{{ trans('layer_groups.none_available') }}</h4>
                            </div>
                        @else
                            <div class="card-body">
                                <table class="table">
                                    <thead class="thead-default">
                                        <tr>
                                                                        <th>{{ trans('layer_groups.map_id') }}</th>
                            <th>{{ trans('layer_groups.group_name') }}</th>
                            <th>{{ trans('layer_groups.delete_at') }}</th>

                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($layerGroups as $layerGroup)
                                        <tr>
                                                                        <td>{{ optional($layerGroup->map)->map_name }}</td>
                            <td>{{ $layerGroup->group_name }}</td>
                            <td>{{ $layerGroup->delete_at }}</td>

                                             <td>
                                                 <form method="POST" action="{!! route('layer_groups.layer_group.destroy', $layerGroup->id) !!}" accept-charset="UTF-8">
                                                     <input name="_method" value="DELETE" type="hidden">
                                                     {{ csrf_field() }}
                                                      <div class="btn-group btn-group-xs pull-right" role="group">
                                                           <a href="{{ route('layer_groups.layer_group.show', $layerGroup->id ) }}" class="btn btn-info" title="{{ trans('layer_groups.show') }}">
                                                                <i class="fa fa-eye" aria-hidden="true"></i>
                                                           </a>
                                                           <a href="{{ route('layer_groups.layer_group.edit', $layerGroup->id ) }}" class="btn btn-primary" title="{{ trans('layer_groups.edit') }}">
                                                                <i class="fa fa-edit" aria-hidden="true"></i>
                                                           </a>

                                                           <button type="submit" class="btn btn-danger" title="{{ trans('layer_groups.delete') }}" onclick="return confirm(&quot;{{ trans('layer_groups.confirm_delete') }}&quot;)">
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
                                {!! $layerGroups->render() !!}
                            </div>
                         @endif
                    </div>
                </div>
            </div>
    </div>
@endsection

