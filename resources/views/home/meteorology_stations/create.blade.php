@extends('layouts.app')

@section('content')
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card m-b-30">
                        <div class="card-header">
                            <h4 class="pull-left mb-0">{{ trans('meteorology_stations.create') }}</h4>
                            <h4 class="pull-right mt-0 mb-0">
                                <a href="{{ route('meteorology_stations.meteorology_station.index') }}" class="btn btn-primary waves-effect waves-light " title="{{ trans('meteorology_stations.show_all') }}">
                                    <i class="fa fa-list"></i> {{ trans('meteorology_stations.show_all') }}
                                </a>
                            </h4>
                        </div>
                        <div class="card-body">
                            @if ($errors->any())
                                <ul class="alert alert-danger">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            @endif
                            <form method="POST" action="{{ route('meteorology_stations.meteorology_station.store') }}" accept-charset="UTF-8" id="create_meteorology_station_form" name="create_meteorology_station_form" class="form-horizontal">
                                {{ csrf_field() }}
                                @include ('meteorology_stations.form', ['meteorologyStation' => null,])
                                <div class="form-group">
                                    <div class="col-md-offset-2 col-md-10">
                                        <input class="btn btn-primary" type="submit" value="{{ trans('meteorology_stations.add') }}">
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection


