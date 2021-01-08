@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card m-b-30">
                            <div class="card-header">
                                <h4 class="pull-left mb-0">{{ !empty($title) ? $title : 'Map' }}</h4>
                                <div class="btn-group  mt-0 mb-0 pull-right" role="group">
                                    <a href="{{ route('maps.map.index') }}" class="btn btn-primary waves-effect waves-light" title="{{ trans('maps.show_all') }}">
                                        <i class="fa fa-list" aria-hidden="true"></i> {{ trans('maps.show_all') }}
                                    </a>
                                    <a href="{{ route('maps.map.create') }}" class="btn btn-success waves-effect waves-light" title="{{ trans('maps.create') }}">
                                        <i class="fa fa-plus" aria-hidden="true"></i> {{ trans('maps.create') }}
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

                                <form method="POST" action="{{ route('maps.map.update', $map->id) }}" id="edit_map_form" name="edit_map_form" accept-charset="UTF-8" class="form-horizontal">
                                {{ csrf_field() }}
                                    <input name="_method" type="hidden" value="PUT">
                                        @include ('admin.maps.form', ['map' => $map,])

                                    <div class="form-group">
                                        <div class="col-md-offset-2 col-md-10">
                                            <input class="btn btn-primary" type="submit" value="{{ trans('maps.update') }}">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
@endsection