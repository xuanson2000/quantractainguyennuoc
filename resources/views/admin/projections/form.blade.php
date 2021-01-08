
<div class="form-group row {{ $errors->has('srid') ? 'has-error' : '' }}">
    <label for="srid" class="col-md-4 col-form-label required text-right">{{ trans('projections.srid') }}</label>
    <div class="col-md-6">
        <input class="form-control" name="srid" type="text" id="srid" value="{{ old('srid', optional($projection)->srid) }}" minlength="1" placeholder="{{ trans('projections.srid__placeholder') }}">
        {!! $errors->first('srid', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group row {{ $errors->has('proj4_params') ? 'has-error' : '' }}">
    <label for="proj4_params" class="col-md-4 col-form-label required text-right">{{ trans('projections.proj4_params') }}</label>
    <div class="col-md-6">
        <input class="form-control" name="proj4_params" type="text" id="proj4_params" value="{{ old('proj4_params', optional($projection)->proj4_params) }}" minlength="1" placeholder="{{ trans('projections.proj4_params__placeholder') }}">
        {!! $errors->first('proj4_params', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group row {{ $errors->has('extent') ? 'has-error' : '' }}">
    <label for="extent" class="col-md-4 col-form-label required text-right">{{ trans('projections.extent') }}</label>
    <div class="col-md-6">
        <input class="form-control" name="extent" type="text" id="extent" value="{{ old('extent', optional($projection)->extent) }}" minlength="1" placeholder="{{ trans('projections.extent__placeholder') }}">
        {!! $errors->first('extent', '<p class="help-block">:message</p>') !!}
    </div>
</div>

