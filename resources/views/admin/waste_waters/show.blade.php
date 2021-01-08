@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Waste Water' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('waste_waters.waste_water.destroy', $wasteWater->xt_id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('waste_waters.waste_water.index') }}" class="btn btn-primary" title="{{ trans('waste_waters.show_all') }}">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('waste_waters.waste_water.create') }}" class="btn btn-success" title="{{ trans('waste_waters.create') }}">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('waste_waters.waste_water.edit', $wasteWater->xt_id ) }}" class="btn btn-primary" title="{{ trans('waste_waters.edit') }}">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="{{ trans('waste_waters.delete') }}" onclick="return confirm(&quot;{{ trans('waste_waters.confirm_delete') }}?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>{{ trans('waste_waters.xt_id') }}</dt>
            <dd>{{ optional($wasteWater->xt)->id }}</dd>
            <dt>{{ trans('waste_waters.id_dks') }}</dt>
            <dd>{{ $wasteWater->id_dks }}</dd>
            <dt>{{ trans('waste_waters.tennguonthai') }}</dt>
            <dd>{{ $wasteWater->tennguonthai }}</dd>
            <dt>{{ trans('waste_waters.luuluong') }}</dt>
            <dd>{{ $wasteWater->luuluong }}</dd>
            <dt>{{ trans('waste_waters.xt_tructiep') }}</dt>
            <dd>{{ ($wasteWater->xt_tructiep) ? 'Yes' : 'No' }}</dd>
            <dt>{{ trans('waste_waters.xt_daxuly') }}</dt>
            <dd>{{ ($wasteWater->xt_daxuly) ? 'Yes' : 'No' }}</dd>
            <dt>{{ trans('waste_waters.noitiepnhan') }}</dt>
            <dd>{{ $wasteWater->noitiepnhan }}</dd>
            <dt>{{ trans('waste_waters.dotrong') }}</dt>
            <dd>{{ ($wasteWater->dotrong) ? 'Yes' : 'No' }}</dd>
            <dt>{{ trans('waste_waters.mau') }}</dt>
            <dd>{{ $wasteWater->mau }}</dd>
            <dt>{{ trans('waste_waters.mui') }}</dt>
            <dd>{{ $wasteWater->mui }}</dd>
            <dt>{{ trans('waste_waters.loaihinh') }}</dt>
            <dd>{{ $wasteWater->loaihinh }}</dd>
            <dt>{{ trans('waste_waters.sohieu_dks') }}</dt>
            <dd>{{ $wasteWater->sohieu_dks }}</dd>
            <dt>{{ trans('waste_waters.geom') }}</dt>
            <dd>{{ $wasteWater->geom }}</dd>

        </dl>

    </div>
</div>

@endsection