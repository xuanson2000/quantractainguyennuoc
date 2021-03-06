@extends('layouts.app')

@section('content')
    <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card m-b-30">
                            <div class="card-header">
                                <h4 class="pull-left mb-0">{{ !empty($title) ? $title : 'Surfacewater Station' }}</h4>
                                <div class="btn-group  mt-0 mb-0 pull-right" role="group">
                                    <a href="{{ route('surfacewater_stations.surfacewater_station.index') }}" class="btn btn-primary waves-effect waves-light" title="{{ trans('surfacewater_stations.show_all') }}">
                                        <i class="fa fa-list" aria-hidden="true"></i> {{ trans('surfacewater_stations.show_all') }}
                                    </a>
                                    <a href="{{ route('surfacewater_stations.surfacewater_station.create') }}" class="btn btn-success waves-effect waves-light" title="{{ trans('surfacewater_stations.create') }}">
                                        <i class="fa fa-plus" aria-hidden="true"></i> {{ trans('surfacewater_stations.create') }}
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

                                <form method="POST" action="{{ route('surfacewater_stations.surfacewater_station.update', $surfacewaterStation->gid) }}" id="edit_surfacewater_station_form" name="edit_surfacewater_station_form" accept-charset="UTF-8" class="form-horizontal">
                                {{ csrf_field() }}
                                    <input name="_method" type="hidden" value="PUT">
                                        @include ('surfacewater_stations.form', ['surfacewaterStation' => $surfacewaterStation,])

                                    <div class="form-group">
                                        <div class="col-md-offset-2 col-md-10">
                                            <input class="btn btn-primary" type="submit" value="{{ trans('surfacewater_stations.update') }}">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
@endsection