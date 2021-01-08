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
                            <h4 class="pull-left mb-0">{{ trans('waste_waters.model_plural') }}</h4>
                            <h4 class="pull-right mt-0 mb-0">
                                <a class="btn btn-success waves-effect waves-light pull-right" href="{{ route('waste_waters.waste_water.create') }}" class="btn btn-success" title="{{ trans('waste_waters.create') }}">
                                    <i class="fa fa-plus" aria-hidden="true"></i> {{ trans('waste_waters.create') }}
                                 </a>
                            </h4>
                        </div>
                        @if(count($wasteWaters) == 0)
                            <div class="card-body">
                                 <h4>{{ trans('waste_waters.none_available') }}</h4>
                            </div>
                        @else
                            <div class="card-body">
                                <table class="table">
                                    <thead class="thead-default">
                                        <tr>
                                                                        <th>{{ trans('waste_waters.xt_id') }}</th>
                            <th>{{ trans('waste_waters.id_dks') }}</th>
                            <th>{{ trans('waste_waters.tennguonthai') }}</th>
                            <th>{{ trans('waste_waters.luuluong') }}</th>
                            <th>{{ trans('waste_waters.xt_tructiep') }}</th>
                            <th>{{ trans('waste_waters.xt_daxuly') }}</th>
                            <th>{{ trans('waste_waters.noitiepnhan') }}</th>
                            <th>{{ trans('waste_waters.dotrong') }}</th>
                            <th>{{ trans('waste_waters.mau') }}</th>
                            <th>{{ trans('waste_waters.mui') }}</th>
                            <th>{{ trans('waste_waters.loaihinh') }}</th>
                            <th>{{ trans('waste_waters.sohieu_dks') }}</th>
                            <th>{{ trans('waste_waters.geom') }}</th>

                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($wasteWaters as $wasteWater)
                                        <tr>
                                                                        <td>{{ optional($wasteWater->xt)->id }}</td>
                            <td>{{ $wasteWater->id_dks }}</td>
                            <td>{{ $wasteWater->tennguonthai }}</td>
                            <td>{{ $wasteWater->luuluong }}</td>
                            <td>{{ ($wasteWater->xt_tructiep) ? 'Yes' : 'No' }}</td>
                            <td>{{ ($wasteWater->xt_daxuly) ? 'Yes' : 'No' }}</td>
                            <td>{{ $wasteWater->noitiepnhan }}</td>
                            <td>{{ ($wasteWater->dotrong) ? 'Yes' : 'No' }}</td>
                            <td>{{ $wasteWater->mau }}</td>
                            <td>{{ $wasteWater->mui }}</td>
                            <td>{{ $wasteWater->loaihinh }}</td>
                            <td>{{ $wasteWater->sohieu_dks }}</td>
                            <td>{{ $wasteWater->geom }}</td>

                                             <td>
                                                 <form method="POST" action="{!! route('waste_waters.waste_water.destroy', $wasteWater->xt_id) !!}" accept-charset="UTF-8">
                                                     <input name="_method" value="DELETE" type="hidden">
                                                     {{ csrf_field() }}
                                                      <div class="btn-group btn-group-xs pull-right" role="group">
                                                           <a href="{{ route('waste_waters.waste_water.show', $wasteWater->xt_id ) }}" class="btn btn-info" title="{{ trans('waste_waters.show') }}">
                                                                <i class="fa fa-eye" aria-hidden="true"></i>
                                                           </a>
                                                           <a href="{{ route('waste_waters.waste_water.edit', $wasteWater->xt_id ) }}" class="btn btn-primary" title="{{ trans('waste_waters.edit') }}">
                                                                <i class="fa fa-edit" aria-hidden="true"></i>
                                                           </a>

                                                           <button type="submit" class="btn btn-danger" title="{{ trans('waste_waters.delete') }}" onclick="return confirm(&quot;{{ trans('waste_waters.confirm_delete') }}&quot;)">
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
                                {!! $wasteWaters->render() !!}
                            </div>
                         @endif
                    </div>
                </div>
            </div>
    </div>
@endsection

