@extends('layouts.app')

@section('content')
    <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card m-b-30">
                            <div class="card-header">
                                <h4 class="pull-left mb-0">{{ !empty($title) ? $title : 'Tramdomua' }}</h4>
                                <div class="btn-group  mt-0 mb-0 pull-right" role="group">
                                    <a href="{{ route('tramdomuas.tramdomua.index') }}" class="btn btn-primary waves-effect waves-light" title="{{ trans('tramdomuas.show_all') }}">
                                        <i class="fa fa-list" aria-hidden="true"></i> {{ trans('tramdomuas.show_all') }}
                                    </a>
                                    <a href="{{ route('tramdomuas.tramdomua.create') }}" class="btn btn-success waves-effect waves-light" title="{{ trans('tramdomuas.create') }}">
                                        <i class="fa fa-plus" aria-hidden="true"></i> {{ trans('tramdomuas.create') }}
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

                                <form method="POST" action="{{ route('tramdomuas.tramdomua.update', $tramdomua->gid) }}" id="edit_tramdomua_form" name="edit_tramdomua_form" accept-charset="UTF-8" class="form-horizontal">
                                {{ csrf_field() }}
                                    <input name="_method" type="hidden" value="PUT">
                                        @include ('tramdomuas.form', ['tramdomua' => $tramdomua,])

                                    <div class="form-group">
                                        <div class="col-md-offset-2 col-md-10">
                                            <input class="btn btn-primary" type="submit" value="{{ trans('tramdomuas.update') }}">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
@endsection