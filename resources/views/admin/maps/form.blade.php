
<div class="form-group row {{ $errors->has('map_name') ? 'has-error' : '' }}">
    <label for="map_name" class="col-md-4 col-form-label required text-right">{{ trans('maps.map_name') }}</label>
    <div class="col-md-6">
        <input class="form-control" name="map_name" type="text" id="map_name" value="{{ old('map_name', optional($map)->map_name) }}" minlength="1" placeholder="{{ trans('maps.map_name__placeholder') }}">
        {!! $errors->first('map_name', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group row {{ $errors->has('map_title') ? 'has-error' : '' }}">
    <label for="map_title" class="col-md-4 col-form-label required text-right">{{ trans('maps.map_title') }}</label>
    <div class="col-md-6">
        <input class="form-control" name="map_title" type="text" id="map_title" value="{{ old('map_title', optional($map)->map_title) }}" minlength="1" placeholder="{{ trans('maps.map_title__placeholder') }}">
        {!! $errors->first('map_title', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group row {{ $errors->has('map_abstract') ? 'has-error' : '' }}">
    <label for="map_abstract" class="col-md-4 col-form-label required text-right">{{ trans('maps.map_abstract') }}</label>
    <div class="col-md-6">
        <input class="form-control" name="map_abstract" type="text" id="map_abstract" value="{{ old('map_abstract', optional($map)->map_abstract) }}" minlength="1" placeholder="{{ trans('maps.map_abstract__placeholder') }}">
        {!! $errors->first('map_abstract', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group row {{ $errors->has('extent_minx') ? 'has-error' : '' }}">
    <label for="extent_minx" class="col-md-4 col-form-label required text-right">{{ trans('maps.extent_minx') }}</label>
    <div class="col-md-6">
        <input class="form-control" name="extent_minx" type="text" id="extent_minx" value="{{ old('extent_minx', optional($map)->extent_minx) }}" min="-9" max="9" placeholder="{{ trans('maps.extent_minx__placeholder') }}">
        {!! $errors->first('extent_minx', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group row {{ $errors->has('extent_miny') ? 'has-error' : '' }}">
    <label for="extent_miny" class="col-md-4 col-form-label required text-right">{{ trans('maps.extent_miny') }}</label>
    <div class="col-md-6">
        <input class="form-control" name="extent_miny" type="text" id="extent_miny" value="{{ old('extent_miny', optional($map)->extent_miny) }}" min="-9" max="9" placeholder="{{ trans('maps.extent_miny__placeholder') }}">
        {!! $errors->first('extent_miny', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group row {{ $errors->has('extent_maxx') ? 'has-error' : '' }}">
    <label for="extent_maxx" class="col-md-4 col-form-label required text-right">{{ trans('maps.extent_maxx') }}</label>
    <div class="col-md-6">
        <input class="form-control" name="extent_maxx" type="text" id="extent_maxx" value="{{ old('extent_maxx', optional($map)->extent_maxx) }}" min="-9" max="9" placeholder="{{ trans('maps.extent_maxx__placeholder') }}">
        {!! $errors->first('extent_maxx', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group row {{ $errors->has('extent_maxy') ? 'has-error' : '' }}">
    <label for="extent_maxy" class="col-md-4 col-form-label required text-right">{{ trans('maps.extent_maxy') }}</label>
    <div class="col-md-6">
        <input class="form-control" name="extent_maxy" type="text" id="extent_maxy" value="{{ old('extent_maxy', optional($map)->extent_maxy) }}" min="-9" max="9" placeholder="{{ trans('maps.extent_maxy__placeholder') }}">
        {!! $errors->first('extent_maxy', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group row {{ $errors->has('status') ? 'has-error' : '' }}">
    <label for="status" class="col-md-4 col-form-label required text-right">{{ trans('maps.status') }}</label>
    <div class="col-md-6">
        <div class="checkbox">
            <label for="status_1">
            	<input id="status_1" class="" name="status" type="checkbox" value="1" {{ old('status', optional($map)->status) == '1' ? 'checked' : '' }}>
                Yes
            </label>
        </div>

        {!! $errors->first('status', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group row {{ $errors->has('unit') ? 'has-error' : '' }}">
    <label for="unit" class="col-md-4 col-form-label required text-right">{{ trans('maps.unit') }}</label>
    <div class="col-md-6">
        <input class="form-control" name="unit" type="text" id="unit" value="{{ old('unit', optional($map)->unit) }}" minlength="1" placeholder="{{ trans('maps.unit__placeholder') }}">
        {!! $errors->first('unit', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group row {{ $errors->has('size_x') ? 'has-error' : '' }}">
    <label for="size_x" class="col-md-4 col-form-label required text-right">{{ trans('maps.size_x') }}</label>
    <div class="col-md-6">
        <input class="form-control" name="size_x" type="text" id="size_x" value="{{ old('size_x', optional($map)->size_x) }}" minlength="1" placeholder="{{ trans('maps.size_x__placeholder') }}">
        {!! $errors->first('size_x', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group row {{ $errors->has('size_y') ? 'has-error' : '' }}">
    <label for="size_y" class="col-md-4 col-form-label required text-right">{{ trans('maps.size_y') }}</label>
    <div class="col-md-6">
        <input class="form-control" name="size_y" type="text" id="size_y" value="{{ old('size_y', optional($map)->size_y) }}" minlength="1" placeholder="{{ trans('maps.size_y__placeholder') }}">
        {!! $errors->first('size_y', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group row {{ $errors->has('proj') ? 'has-error' : '' }}">
    <label for="proj" class="col-md-4 col-form-label required text-right">{{ trans('maps.proj') }}</label>
    <div class="col-md-6">
        <select class="form-control" id="proj" name="proj">
        	    <option value="" style="display: none;" {{ old('proj', optional($map)->proj ?: '') == '' ? 'selected' : '' }} disabled selected>{{ trans('maps.proj__placeholder') }}</option>
        	@foreach ($projs as $key => $proj)
			    <option value="{{ $key }}" {{ old('proj', optional($map)->proj) == $key ? 'selected' : '' }}>
			    	{{ $proj }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('proj', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group row {{ $errors->has('web_minscale') ? 'has-error' : '' }}">
    <label for="web_minscale" class="col-md-4 col-form-label required text-right">{{ trans('maps.web_minscale') }}</label>
    <div class="col-md-6">
        <input class="form-control" name="web_minscale" type="text" id="web_minscale" value="{{ old('web_minscale', optional($map)->web_minscale) }}" min="-2147483648" max="2147483647" placeholder="{{ trans('maps.web_minscale__placeholder') }}">
        {!! $errors->first('web_minscale', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group row {{ $errors->has('web_maxscale') ? 'has-error' : '' }}">
    <label for="web_maxscale" class="col-md-4 col-form-label required text-right">{{ trans('maps.web_maxscale') }}</label>
    <div class="col-md-6">
        <input class="form-control" name="web_maxscale" type="text" id="web_maxscale" value="{{ old('web_maxscale', optional($map)->web_maxscale) }}" min="-2147483648" max="2147483647" placeholder="{{ trans('maps.web_maxscale__placeholder') }}">
        {!! $errors->first('web_maxscale', '<p class="help-block">:message</p>') !!}
    </div>
</div>

