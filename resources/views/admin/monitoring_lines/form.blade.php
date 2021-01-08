
<div class="form-group row {{ $errors->has('gid') ? 'has-error' : '' }}">
    <label for="gid" class="col-md-4 col-form-label required text-right">{{ trans('monitoring_lines.gid') }}</label>
    <div class="col-md-6">
        <input class="form-control" name="gid" type="text" id="gid" value="{{ old('gid', optional($monitoringLine)->gid) }}" minlength="1" placeholder="{{ trans('monitoring_lines.gid__placeholder') }}">
        {!! $errors->first('gid', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group row {{ $errors->has('line_name') ? 'has-error' : '' }}">
    <label for="line_name" class="col-md-4 col-form-label required text-right">{{ trans('monitoring_lines.line_name') }}</label>
    <div class="col-md-6">
        <input class="form-control" name="line_name" type="text" id="line_name" value="{{ old('line_name', optional($monitoringLine)->line_name) }}" minlength="1" placeholder="{{ trans('monitoring_lines.line_name__placeholder') }}">
        {!! $errors->first('line_name', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group row {{ $errors->has('id_network') ? 'has-error' : '' }}">
    <label for="id_network" class="col-md-4 col-form-label required text-right">{{ trans('monitoring_lines.id_network') }}</label>
    <div class="col-md-6">
        <input class="form-control" name="id_network" type="text" id="id_network" value="{{ old('id_network', optional($monitoringLine)->id_network) }}" minlength="1" placeholder="{{ trans('monitoring_lines.id_network__placeholder') }}">
        {!! $errors->first('id_network', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group row {{ $errors->has('geom') ? 'has-error' : '' }}">
    <label for="geom" class="col-md-4 col-form-label required text-right">{{ trans('monitoring_lines.geom') }}</label>
    <div class="col-md-6">
        <input class="form-control" name="geom" type="text" id="geom" value="{{ old('geom', optional($monitoringLine)->geom) }}" minlength="1" placeholder="{{ trans('monitoring_lines.geom__placeholder') }}">
        {!! $errors->first('geom', '<p class="help-block">:message</p>') !!}
    </div>
</div>

