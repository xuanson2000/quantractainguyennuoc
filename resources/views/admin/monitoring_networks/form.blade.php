
<div class="form-group row {{ $errors->has('gid') ? 'has-error' : '' }}">
    <label for="gid" class="col-md-4 col-form-label required text-right">{{ trans('monitoring_networks.gid') }}</label>
    <div class="col-md-6">
        <input class="form-control" name="gid" type="text" id="gid" value="{{ old('gid', optional($monitoringNetwork)->gid) }}" min="-2147483648" max="2147483647" placeholder="{{ trans('monitoring_networks.gid__placeholder') }}">
        {!! $errors->first('gid', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group row {{ $errors->has('network_name') ? 'has-error' : '' }}">
    <label for="network_name" class="col-md-4 col-form-label required text-right">{{ trans('monitoring_networks.network_name') }}</label>
    <div class="col-md-6">
        <input class="form-control" name="network_name" type="text" id="network_name" value="{{ old('network_name', optional($monitoringNetwork)->network_name) }}" minlength="1" placeholder="{{ trans('monitoring_networks.network_name__placeholder') }}">
        {!! $errors->first('network_name', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group row {{ $errors->has('network_code') ? 'has-error' : '' }}">
    <label for="network_code" class="col-md-4 col-form-label required text-right">{{ trans('monitoring_networks.network_code') }}</label>
    <div class="col-md-6">
        <input class="form-control" name="network_code" type="text" id="network_code" value="{{ old('network_code', optional($monitoringNetwork)->network_code) }}" minlength="1" placeholder="{{ trans('monitoring_networks.network_code__placeholder') }}">
        {!! $errors->first('network_code', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group row {{ $errors->has('geom') ? 'has-error' : '' }}">
    <label for="geom" class="col-md-4 col-form-label required text-right">{{ trans('monitoring_networks.geom') }}</label>
    <div class="col-md-6">
        <input class="form-control" name="geom" type="text" id="geom" value="{{ old('geom', optional($monitoringNetwork)->geom) }}" minlength="1" placeholder="{{ trans('monitoring_networks.geom__placeholder') }}">
        {!! $errors->first('geom', '<p class="help-block">:message</p>') !!}
    </div>
</div>

