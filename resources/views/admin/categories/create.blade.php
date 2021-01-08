@extends('admin.layouts.app')

@section('content')
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card m-b-30">
                        <div class="card-header">
                            <h4 class="pull-left mb-0">{{ trans('categories.create') }}</h4>
                            <h4 class="pull-right mt-0 mb-0">
                                <a href="{{ route('categories.category.index') }}" class="btn btn-primary waves-effect waves-light " title="{{ trans('categories.show_all') }}">
                                    <i class="fa fa-list"></i> {{ trans('categories.show_all') }}
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
                            <form method="POST" action="{{ route('categories.category.store') }}" accept-charset="UTF-8" id="create_category_form" name="create_category_form" class="form-horizontal">
                                {{ csrf_field() }}
                                @include ('admin.categories.form', ['category' => null,])
                                <div class="form-group">
                                    <div class="col-md-offset-2 col-md-10">
                                        <input class="btn btn-primary" type="submit" value="{{ trans('categories.add') }}">
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection


