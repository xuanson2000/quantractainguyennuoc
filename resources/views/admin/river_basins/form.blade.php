
<div class="form-group row {{ $errors->has('gid') ? 'has-error' : '' }}">
    <label for="gid" class="col-md-4 col-form-label required text-right">{{ trans('river_basins.gid') }}</label>
    <div class="col-md-6">
        <input class="form-control" name="gid" type="text" id="gid" value="{{ old('gid', optional($riverBasin)->gid) }}" min="-2147483648" max="2147483647" required="true" placeholder="{{ trans('river_basins.gid__placeholder') }}">
        {!! $errors->first('gid', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group row {{ $errors->has('name_o') ? 'has-error' : '' }}">
    <label for="name_o" class="col-md-4 col-form-label required text-right">{{ trans('river_basins.name_o') }}</label>
    <div class="col-md-6">
        <input class="form-control" name="name_o" type="text" id="name_o" value="{{ old('name_o', optional($riverBasin)->name_o) }}" minlength="1" placeholder="{{ trans('river_basins.name_o__placeholder') }}">
        {!! $errors->first('name_o', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group row {{ $errors->has('basin_name') ? 'has-error' : '' }}">
    <label for="basin_name" class="col-md-4 col-form-label required text-right">{{ trans('river_basins.basin_name') }}</label>
    <div class="col-md-6">
        <input class="form-control" name="basin_name" type="text" id="basin_name" value="{{ old('basin_name', optional($riverBasin)->basin_name) }}" minlength="1" placeholder="{{ trans('river_basins.basin_name__placeholder') }}">
        {!! $errors->first('basin_name', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group row {{ $errors->has('geom') ? 'has-error' : '' }}">
    <label for="geom" class="col-md-4 col-form-label required text-right">{{ trans('river_basins.geom') }}</label>
    <div class="col-md-6">
        <input class="form-control" name="geom" type="text" id="geom" value="{{ old('geom', optional($riverBasin)->geom) }}" minlength="1" placeholder="{{ trans('river_basins.geom__placeholder') }}">
        {!! $errors->first('geom', '<p class="help-block">:message</p>') !!}
    </div>
</div>

