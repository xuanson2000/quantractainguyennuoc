@extends('admin.layouts.app')

@section('content')
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card m-b-30">
                        <div class="card-header">
                            <h4 class="pull-left mb-0">{{ trans('maps.create') }}</h4>
                            <h4 class="pull-right mt-0 mb-0">
                                <a href="{{ route('maps.map.index') }}" class="btn btn-primary waves-effect waves-light " title="{{ trans('maps.show_all') }}">
                                    <i class="fa fa-list"></i> {{ trans('maps.show_all') }}
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
                            <form method="POST" action="{{ route('maps.map.store') }}" accept-charset="UTF-8" id="create_map_form" name="create_map_form" class="form-horizontal">
                                {{ csrf_field() }}
                                @include ('admin.maps.form', ['map' => null,])
                                <div class="form-group">
                                    <div class="col-md-offset-2 col-md-10">
                                        <input class="btn btn-primary" type="submit" value="{{ trans('maps.add') }}">
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection


