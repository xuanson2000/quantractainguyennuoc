@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card m-b-30">
                            <div class="card-header">
                                <h4 class="pull-left mb-0">{{ !empty($title) ? $title : 'River Basin' }}</h4>
                                <div class="btn-group  mt-0 mb-0 pull-right" role="group">
                                    <a href="{{ route('basins.basin.index') }}" class="btn btn-primary waves-effect waves-light" title="{{ trans('river_basins.show_all') }}">
                                        <i class="fa fa-list" aria-hidden="true"></i> {{ trans('river_basins.show_all') }}
                                    </a>
                                    <a href="{{ route('basins.basin.create') }}" class="btn btn-success waves-effect waves-light" title="{{ trans('river_basins.create') }}">
                                        <i class="fa fa-plus" aria-hidden="true"></i> {{ trans('river_basins.create') }}
                                    </a>
                                </div>
                            </div>
                            <div class="card-body">
                                @if ($errors->any())
                                <ul class="alert alert-danger">
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                                @endif

                                <form method="POST" action="{{ route('basins.basin.update', $riverBasin->gid) }}" id="edit_river_basin_form" name="edit_river_basin_form" accept-charset="UTF-8" class="form-horizontal">
                                {{ csrf_field() }}
                                    <input name="_method" type="hidden" value="PUT">
                                        @include ('river_basins.form', ['riverBasin' => $riverBasin,])

                                    <div class="form-group">
                                        <div class="col-md-offset-2 col-md-10">
                                            <input class="btn btn-primary" type="submit" value="{{ trans('river_basins.update') }}">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
@endsection